@extends('layouts.app_modern', ['title' => 'Data Pasien'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Pasien</h5>
        <div class="card-body">
            <form action="/laporan/pasien" method="GET" id="pasien-form">
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
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="">-- Semua Data --</option>
                            <option value="laki-laki"
                                {{ request()->get('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan"
                                {{ request()->get('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Cari</button>
                <div class="form-group col-md-2 p-2">
                    <div class="d-flex align-items-center">
                        <label for="per_page" class="me-2">Show</label>
                        <select name="per_page" class="form-select" onchange="$('#pasien-form').submit()">
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
                @include('partials.tableLaporanPasien')
            </div>
        </div>
    </div>
@endsection
