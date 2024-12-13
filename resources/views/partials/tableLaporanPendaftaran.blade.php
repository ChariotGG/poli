<table class="table table-sm table-bordered text-center">
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
                <td>{{ request()->get('per_page') == 'all'
                    ? $loop->iteration
                    : ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}
                </td>
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
<p>Total Data: {{ request()->get('per_page') == 'all' ? $models->count() : $models->total() }}</p>
@if (request()->get('per_page') != 'all')
    {!! $models->links() !!}
@endif
