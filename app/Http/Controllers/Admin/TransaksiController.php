<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransaksiRequest;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Transaksi::with([
            'detail', 'travel', 'user'
        ])->get();

        return view('pages.admin.transaksi.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransaksiRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->tujuan . '-' . $request->tanggal . '-' . str_replace(':', '-', $request->waktu));

        Transaksi::create($data);
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Transaksi::with([
            'detail', 'travel', 'user'
        ])->findOrFail($id);

        return view('pages.admin.transaksi.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Transaksi::findOrFail($id);

        return view('pages.admin.transaksi.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransaksiRequest $request, string $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->tujuan . '-' . $request->tanggal . '-' . str_replace(':', '-', $request->waktu));

        $item = Transaksi::findOrFail($id);

        $item->update($data);

        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Transaksi::findOrFail($id);

        $item->delete();

        return redirect()->route('transaksi.index');
    }
}
