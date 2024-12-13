@extends('layouts.app_modern', ['title' => 'Tambah Pendaftaran'])
@section('content')
    <div class="card">
        <h5 class="card-header">Pendaftaran Pasien</h5>
        <div class="card-body">
            <form action="/daftar" method="POST">
                @csrf <div class="form-group mt-3">
                    <label for="tanggal_pendaftaran">Tanggal
                        Daftar</label>
                    <input type="date" name="tanggal_pendaftaran" class="form-control"
                        value="{{ old('tanggal_pendaftaran') ?? date('Y-m-d') }}">
                    <span class="text-danger">{{ $errors->first('tanggal_pendaftaran') }}</span>
                </div>
                <div class="form-group mt-3">
                    <label for="pasien_id">Nama Pasien</label> |
                    <a class="sidebar-link" href="/pasien/create" target="_blank">
                        <span class="hide-menu">Pasien Baru</span>
                    </a>
                    <select name="pasien_id" class="form-control js-example-basic-single">
                        <option value="">-- Pilih Pasien --</option>
                        @foreach ($listPasien as $item)
                            <option value="{{ $item->id }}" @selected(old('pasien_id') == $item->id)> {{ $item->no_pasien }} -
                                {{ $item->nama }} </option>
                        @endforeach
                    </select> <span class="text-danger">{{ $errors->first('pasien_id') }}</span>
                </div>
                <div class="form-group mt-3">
                    <label for="poliklinik_id">Poliklinik</label>
                    <select name="poliklinik_id" class="form-control">
                        <option value="">-- Pilih Poliklinik --</option>
                        @foreach ($listPoli as $itemPoli)
                            <option value="{{ $itemPoli->poliklinik_id }}" @selected(old('poliklinik_id') == $itemPoli->poliklinik_id)>
                                {{ $itemPoli->nama_poliklinik }} - {{ $itemPoli->biaya }}</option>
                        @endforeach
                    </select> <span class="text-danger">{{ $errors->first('poliklinik_id') }}</span>
                </div>
                <div class="form-group mt-3 mb-3"> <label for="keluhan">Keluhan</label>
                    <textarea name="keluhan" rows="2" class="form-control">{{ old('keluhan') }}</textarea> <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                </div> <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
