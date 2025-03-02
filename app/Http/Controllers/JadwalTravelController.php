<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;

class JadwalTravelController extends Controller
{
    public function index(Request $request)
    {
        $items = Travel::all();

        return view('pages.app.jadwal-travel', [
            'items' => $items
        ]);
    }
}
