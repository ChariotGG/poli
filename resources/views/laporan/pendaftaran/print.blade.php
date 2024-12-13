@extends('layouts.app_modern', ['title' => 'Data Pendaftaran'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Pendaftaran</h5>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th>No Pasien</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Tgl Pendaftaran</th>
                        <th>Poliklinik</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pasien->no_pasien }}</td>
                            <td>{{ $item->pasien->nama }}</td>
                            <td>{{ $item->pasien->umur }}</td>
                            <td>{{ $item->pasien->jenis_kelamin }}</td>
                            <td>{{ date('d M Y', strtotime($item->tanggal_pendaftaran)) }}</td>
                            <td>{{ $item->poliklinik->nama_poliklinik }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
