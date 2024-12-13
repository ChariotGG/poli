@extends('layouts.app_modern', ['title' => 'Tambah Poliklinik'])
@section('content')
<div class="card">
    <h5 class="card-header">Tambah Poliklinik</h5>
    <div class="card-body">
        <form action="/poliklinik" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-1 mb-3">
                <label for="nama_poliklinik">Nama Poliklinik</label>
                <input type="text" class="form-control @error('nama_poliklinik') is-invalid @enderror" id="nama_poliklinik" name="nama_poliklinik" value="{{ old('nama_poliklinik') }}">
                <span class="text-danger">{{ $errors->first('nama_poliklinik') }}</span>
            </div>
            <div class="form-group mt-1 mb-3"> <label for="biaya">Biaya</label> <input type="number" class="form-control @error('biaya') is-invalid @enderror" id="biaya" name="biaya" value="{{ old('biaya') }}"> <span class="text-danger">{{ $errors->first('biaya') }}</span> </div>
            <div class="form-group mt-1 mb-3"> <label for="keterangan">Keterangan</label> <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}"> <span class="text-danger">{{ $errors->first('keterangan') }}</span> </div>
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </form>
    </div>
</div>
@endsection
