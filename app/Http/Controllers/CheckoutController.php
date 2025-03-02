<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Travel;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaksi::with(['detail', 'travel', 'user'])->findOrFail($id);

        return view('pages.app.checkout', [
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $travel = Travel::findOrFail($id);

        // Cek apakah masih ada kuota
        if ($travel->kuota <= 0) {
            return redirect()->back()->with('error', 'Tiket sudah habis!');
        }

        $transaksi = Transaksi::create([
            'travel_id' => $id,
            'user_id' => Auth::user()->id,
            'total_harga' => $travel->harga, // Akan diperbarui saat menambah penumpang
            'status_transaksi' => 'IN_CART'
        ]);

        DetailTransaksi::create([
            'transaksi_id' => $transaksi->id,
            'nama' => $request->input('nama', 'Guest'), // Default ke 'Guest' jika null
            'no_hp' => $request->input('no_hp', '0000000000'), // Default ke angka nol
        ]);

        return redirect()->route('checkout', $transaksi->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = DetailTransaksi::findOrFail($detail_id);

        $transaksi = Transaksi::with(['detail','travel'])
            ->findOrFail($item->transaksi_id);

        $transaksi->total_harga -= $transaksi->travel->harga;

        $transaksi->save();
        $item->delete();

        return redirect()->route('checkout', $item->transaksi_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string'
        ]);

        $transaksi = Transaksi::with('travel')->findOrFail($id);
        $travel = $transaksi->travel;

        // Cek apakah masih ada kuota tersisa sebelum menambah penumpang
        if ($travel->kuota <= 0) {
            return redirect()->back()->with('error', 'Tiket tidak mencukupi!');
        }

        // Simpan data penumpang
        DetailTransaksi::create([
            'transaksi_id' => $id,
            'nama' => $request->input('nama'),
            'no_hp' => $request->input('no_hp'),
        ]);

        // Kurangi kuota setelah berhasil menambah penumpang
        $travel->kurangiKuota(1);

        // Update total harga transaksi
        $transaksi->total_harga += $travel->harga;
        $transaksi->save();

        return redirect()->route('checkout', $id);
    }

    public function success(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status_transaksi = 'PENDING';

        $transaksi->save();
        return view('pages.app.sukses');
    }
}
