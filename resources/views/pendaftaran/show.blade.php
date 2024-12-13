@extends('layouts.app_modern', ['title' => 'Detail Pendaftaran Pasien'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Pendaftaran : <b>{{ strtoupper($pendaftaran->pasien->nama) }}</b></h5>
        <div class="card-body">
            <table width="100%">
                <tbody>
                    <tr>
                        <th width="15%">No Pasien</th>
                        <td> : {{ $pendaftaran->pasien->no_pasien }}</td>
                    </tr>
                    <tr>
                        <th>Nama Pasien</th>
                        <td> : {{ $pendaftaran->pasien->nama }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td> : {{ $pendaftaran->pasien->jenis_kelamin }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h4>Riwayat Pasien</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal Pendaftaran</th>
                        <th>Keluhan</th>
                        <th>diagnosis</th>
                        <th>tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftaran->pasien->pendaftaran as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('d M Y', strtotime($item->tanggal_pendaftaran)) }}</td>
                            <td>{{ $item->keluhan }}</td>
                            <td>{{ $item->diagnosis }}</td>
                            <td>{{ $item->tindakan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <h4>Data Pendaftaran</h4>
            <table width="100%">
                <tbody>
                    <tr>
                        <th width="15%">No Pendaftaran</th>
                        <td> : {{ $pendaftaran->pendaftaran_id }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pendaftaran</th>
                        <td> : {{ date('d M Y', strtotime($pendaftaran->tanggal_pendaftaran)) }}</td>
                    </tr>
                    <tr>
                        <th>Poli</th>
                        <td> : {{ $pendaftaran->poliklinik->nama_poliklinik }}</td>
                    </tr>
                    <tr>
                        <th>Keluhan</th>
                        <td> : {{ $pendaftaran->keluhan }}</td>
                    </tr>
                    <tr>
                        <th>Status Pendaftaran</th>
                        <td> : {{ $pendaftaran->status_daftar }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h4>Hasil Diagnosis</h4>
            <form action="/pendaftaran/{{ $pendaftaran->pendaftaran_id }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="diagnosis">Diagnosis</label>
                    <textarea name="diagnosis" class="form-control" rows="3">{{ $pendaftaran->diagnosis }}</textarea>
                    <span class="text-danger">{{ $errors->first('diagnosis') }}</span>
                </div>
                <div class="form-group mt-3">
                    <label for="tindakan">Tindakan</label>
                    <textarea name="tindakan" class="form-control" rows="3">{{ $pendaftaran->tindakan }}</textarea>
                    <span class="text-danger">{{ $errors->first('tindakan') }}</span>
                </div>
                <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
