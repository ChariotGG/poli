@extends('layouts.app_modern', ['title' => 'Edit Data Poliklinik'])
@section('content')
    <div class="card">
        <h5 class="card-header">Edit Data Poliklinik : <b>{{ strtoupper($poliklinik->nama_poliklinik) }}</b></h5>
        <div class="card-body">
            <form action="/poliklinik/{{ $poliklinik->poliklinik_id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="nama_poliklinik">Nama Poliklinik</label>
                    <input type="text" class="form-control @error('nama_poliklinik') is-invalid @enderror"
                        id="nama_poliklinik" name="nama_poliklinik"
                        value="{{ old('nama_poliklinik') ?? $poliklinik->nama_poliklinik }}">
                    <span class="text-danger">{{ $errors->first('nama_poliklinik') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="biaya">Biaya</label>
                    <input type="number" class="form-control @error('biaya') is-invalid @enderror" id="biaya"
                        name="biaya" value="{{ old('biaya') ?? $poliklinik->biaya }}"> <span
                        class="text-danger">{{ $errors->first('biaya') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="keterangan">Keterangan</label> <input type="text"
                        class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                        value="{{ old('keterangan') ?? $poliklinik->keterangan }}"> <span
                        class="text-danger">{{ $errors->first('keterangan') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
