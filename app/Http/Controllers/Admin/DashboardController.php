<?php

namespace App\Http\Controllers\Admin;

use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        return view('pages.admin.dashboard', [
            'travel' => Travel::count(),
            'transaksi' => Transaksi::count(),
            'transaksi_pending' => Transaksi::where('status_transaksi', 'PENDING')->count(),
            'transaksi_success' => Transaksi::where('status_transaksi', 'SUCCESS')->count(),
        ]);
    }
}
