<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Http\Requests\StorePendaftaranRequest;
use App\Http\Requests\UpdatePendaftaranRequest;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->filled('q')){
            $data['pendaftaran'] = \App\Models\Pendaftaran::search(request('q'))->paginate(10);
        }else{
            $data['pendaftaran'] = \App\Models\Pendaftaran::latest()->paginate(10);
        }
        return view('pendaftaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listPasien'] = \App\Models\Pasien::orderBy('nama', 'asc')->get();
        $data['listPoli'] = \App\Models\Poliklinik::orderBy('nama_poliklinik', 'asc')->get();
        // $data['listPoli'] = [
        //     'Poli Umum' => 'Poli Umum',
        //     'Poli Gigi' => 'Poli Gigi',
        //     'Poli Kandungan' => 'Poli Kandungan',
        //     'Poli Anak' => 'Poli Anak'
        // ];
        return view('pendaftaran.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tanggal_pendaftaran' => 'required',
            'pasien_id' => 'required',
            'poliklinik_id' => 'required',
            'keluhan' => 'required',
        ]);
        $pendaftaran = new Pendaftaran();
        $pendaftaran->fill($requestData);
        $pendaftaran->save();
        flash('Data berhasil disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($pendaftaran_id)
    {
        $data['pendaftaran'] = \App\Models\Pendaftaran::findOrFail($pendaftaran_id);
        return view('pendaftaran.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $pendaftaran_id)
    {
        $requestData = $request->validate([
            'tindakan' => 'required',
            'diagnosis' => 'required',
        ]);
        $pendaftaran = Pendaftaran::findOrFail($pendaftaran_id);
        $pendaftaran->fill($requestData);
        $pendaftaran->save();
        flash('Data berhasil diupdate')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        flash('Data berhasil dihapus')->success();
        return back();
    }
}
