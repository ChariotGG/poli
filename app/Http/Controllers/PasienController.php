<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->filled('q')){
            $data['pasien'] = \App\Models\Pasien::search(request('q'))->paginate(10);
        }else{
            $data['pasien'] = \App\Models\Pasien::latest()->paginate(10);
        }
        // $data['pasien'] = \App\Models\Pasien::latest()->paginate(10);
        return view('pasien.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien',
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable', //alamat boleh kosong
            'foto_pasien' => 'required|image|mimes:jpg,jpeg,png|max:5000',
        ]);
        $pasien = new \App\Models\Pasien(); //membuat objek kosong di variabel model
        $pasien->fill($requestData); //mengisi var model dengan data yang sudah divalidasi requestData
        $pasien->foto_pasien = $request->file('foto_pasien')->store('public');
        $pasien->save(); //menyimpan data ke database
        flash('Data berhasil disimpan')->success();
        return back(); //mengarahkan user ke url sebelumnya yaitu /pasien/create dengan membawa variabel pesan
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pasien.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $pasien_id)
    {
        $data['pasien'] = \App\Models\Pasien::findOrFail($pasien_id);
        return view('pasien.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $pasien_id)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien,'.$pasien_id.',pasien_id',
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
            'foto_pasien' => 'nullable|image|mimes:jpg,jpeg,png|max:5000',
        ]);
        $pasien = \App\Models\Pasien::findOrFail($pasien_id);
        $pasien->fill($requestData);
        if($request->hasFile('foto_pasien')){
            Storage::delete($pasien->foto_pasien);
            $pasien->foto_pasien = $request->file('foto_pasien')->store('public');
        }
        $pasien->save();
        flash('Data berhasil diupdate')->success();
        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $pasien_id)
    {
        $pasien = \App\Models\Pasien::findOrFail($pasien_id);
        if($pasien->pendaftaran->count() > 0){
            flash('Pasien tidak dapat dihapus terkait pendaftaran')->error();
            return back();
        }
        if($pasien->foto_pasien != null && Storage::exists($pasien->foto_pasien)){
            Storage::delete($pasien->foto_pasien);
        }
        $pasien->delete();
        flash('Data berhasil dihapus')->success();
        return back();
    }
}
