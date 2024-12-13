@extends('layouts.app_modern', ['title' => 'Data Pendaftaran'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Pendaftaran</h5>
        <div class="card-body">
            <form action="/laporan/pendaftaran" method="GET" id="pendaftaran-form">
                <div class="row mt-3">
                    <div class="form-group col-md-4">
                        <label for="tanggal_mulai">Tanggal Daftar Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control"
                               value="{{ request()->get('tanggal_mulai') ?? date('Y-m-d') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tanggal_akhir">Tanggal Daftar Akhir</label>
                        <input type="date" name="tanggal_akhir" class="form-control"
                               value="{{ request()->get('tanggal_akhir') ?? date('Y-m-d') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="poliklinik_id">Poliklinik</label>
                        <select name="poliklinik_id" class="form-control">
                            <option value="">-- Pilih Poliklinik --</option>
                            @foreach ($listPoli as $itemPoli)
                                <option value="{{ $itemPoli->poliklinik_id }}" @selected(old('poliklinik_id') == $itemPoli->poliklinik_id)>
                                    {{ $itemPoli->nama_poliklinik }} - {{ $itemPoli->biaya }}</option>
                            @endforeach
                        </select> <span class="text-danger">{{ $errors->first('poliklinik_id') }}</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Cari</button>
                <div class="form-group col-md-2 p-2">
                    <div class="d-flex align-items-center">
                        <label for="per_page" class="me-2">Show</label>
                        <select name="per_page" class="form-select" onchange="$('#pendaftaran-form').submit()">
                            <option value="10" {{ request()->get('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ request()->get('per_page') == 20 ? 'selected' : '' }}>20</option>
                            <option value="30" {{ request()->get('per_page') == 30 ? 'selected' : '' }}>30</option>
                            <option value="40" {{ request()->get('per_page') == 40 ? 'selected' : '' }}>40</option>
                            <option value="50" {{ request()->get('per_page') == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request()->get('per_page') == 100 ? 'selected' : '' }}>100</option>
                            <option value="all" {{ request()->get('per_page') == 'all' ? 'selected' : '' }}>All</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="table-responsive" id="table-container">
                @include('partials.tableLaporanPendaftaran')
            </div>
        </div>
    </div>
@endsection
