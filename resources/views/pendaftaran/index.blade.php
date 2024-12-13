@extends('layouts.app_modern', ['title' => 'Data Pendaftaran'])
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5>Data Pendaftaran <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary btn-sm">Tambah
                    Pendaftaran</a></h5>
            <form action="">
                <!-- Another variation with a button -->
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Nama/No. Pasien/Nama Poliklinik"
                        value="{{ request('q') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="ti ti-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered text-center">
                    <thead>
                        <tr class="align-middle">
                            <th>No.</th>
                            <th>No. Pasien</th>
                            <th>Tanggal Pendaftaran</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Nama Poliklinik</th>
                            <th>Keluhan</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftaran as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pasien->no_pasien }}</td>
                                <td>{{ date('d M Y', strtotime($item->tanggal_pendaftaran)) }}</td>
                                <td class="text-start">
                                    @if ($item->pasien->foto_pasien)
                                        <img src="{{ \Storage::url($item->pasien->foto_pasien) }}" width="50" />
                                    @endif
                                    {{ $item->pasien->nama }}
                                </td>
                                <td>{{ Str::ucfirst($item->pasien->jenis_kelamin) }}</td>
                                <td>{{ $item->poliklinik->nama_poliklinik }}</td>
                                <td class="text-start">{{ $item->keluhan }}</td>
                                <td>
                                    <a href="/pendaftaran/{{ $item->pendaftaran_id }}"
                                        class="btn btn-primary btn-sm">Detail</a>
                                    <form action="/pendaftaran/{{ $item->pendaftaran_id }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus Data ?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $pendaftaran->links() !!}
            </div>
        </div>
    </div>
@endsection
