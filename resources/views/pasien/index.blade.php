@extends('layouts.app_modern', ['title' => 'Data Pasien'])
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5>Data Pasien <a href="{{ route('pasien.create') }}" class="btn btn-primary btn-sm">Tambah
                Pasien</a></h5>
            <form action="">
                <!-- Another variation with a button -->
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Nama/No. Pasien"
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
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            {{-- <th>Tgl Buat</th> --}}
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->no_pasien }}</td>
                                <td class="text-start">
                                    @if ($item->foto_pasien)
                                        <img src="{{ \Storage::url($item->foto_pasien) }}" width="50" />
                                    @endif
                                    {{ $item->nama }}
                                </td>
                                <td>{{ $item->umur }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                {{-- <td>{{ date('d M Y', strtotime($item->created_at)) }}</td> --}}
                                <td>
                                    <a href="/pasien/{{ $item->pasien_id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="/pasien/{{ $item->pasien_id }}" method="POST" class="d-inline">
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
                {!! $pasien->links() !!}
            </div>
        </div>
    </div>
@endsection
