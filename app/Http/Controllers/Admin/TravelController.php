<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelRequest;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Travel::all();

        return view('pages.admin.travel.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.travel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TravelRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->tujuan . '-' . $request->tanggal . '-' . str_replace(':', '-', $request->waktu));

        Travel::create($data);
        return redirect()->route('travel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Travel::findOrFail($id);

        return view('pages.admin.travel.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TravelRequest $request, string $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->tujuan . '-' . $request->tanggal . '-' . str_replace(':', '-', $request->waktu));

        $item = Travel::findOrFail($id);

        $item->update($data);

        return redirect()->route('travel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Travel::findOrFail($id);

        $item->delete();

        return redirect()->route('travel.index');
    }
}
