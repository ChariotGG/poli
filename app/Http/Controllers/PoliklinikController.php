<?php

namespace App\Http\Controllers;

use App\Models\Poliklinik;
use App\Http\Requests\StorePoliklinikRequest;
use App\Http\Requests\UpdatePoliklinikRequest;
use Illuminate\Http\Request;

class PoliklinikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['poliklinik'] = \App\Models\Poliklinik::latest()->paginate(10);
        return view('poliklinik.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poliklinik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama_poliklinik' => 'required|min:5|unique:polikliniks,nama_poliklinik',
            'biaya' => 'required|numeric|min:4',
            'keterangan' => 'nullable',
        ]);
        $poliklinik = new \App\Models\Poliklinik();
        $poliklinik->fill($requestData);
        $poliklinik->save();
        flash('Data berhasil disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Poliklinik $poliklinik)
    {
        return view('poliklinik.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $poliklinik_id)
    {
        $data['poliklinik'] = \App\Models\Poliklinik::findOrFail($poliklinik_id);
        return view('poliklinik.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $poliklinik_id)
    {
        $requestData = $request->validate([
            'nama_poliklinik' => 'required|min:5|unique:polikliniks,nama_poliklinik,'.$poliklinik_id.',poliklinik_id',
            'biaya' => 'required|numeric|min:4',
            'keterangan' => 'nullable',
        ]);
        $poliklinik = \App\Models\Poliklinik::findOrFail($poliklinik_id);
        $poliklinik->fill($requestData);
        $poliklinik->save();
        flash('Data berhasil diupdate')->success();
        return redirect('/poliklinik');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poliklinik $poliklinik)
    {
        //
    }
}
