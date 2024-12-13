@extends('layouts.app_modern', ['title' => 'Data Poliklinik'])
@section('content')
    <div class="card">
        <h5 class="card-header d-flex align-items-center justify-content-between">Data Poliklinik<a href="{{ route('poliklinik.create') }}" class="btn btn-primary btn-sm">Tambah Poliklinik</a></h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered text-center">
                    <thead>
                        <tr class="align-middle">
                            <th>No.</th>
                            <th>Nama Poliklinik</th>
                            <th>Biaya</th>
                            <th>Keterangan</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($poliklinik as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">
                                    {{ $item->nama_poliklinik }}
                                </td>
                                {{-- <td>{{ $item->biaya }}</td> --}}
                                <td class="text-end">{{ Str::formatCurrencyIndo($item->biaya) }}</td>
                                <td class="text-start">{{ $item->keterangan }}</td>
                                <td>
                                    <a href="/poliklinik/{{ $item->poliklinik_id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="/poliklinik/{{ $item->poliklinik_id }}" method="POST" class="d-inline">
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
                {!! $poliklinik->links() !!}
            </div>
        </div>
    </div>
@endsection
