
<table class="table table-sm table-bordered text-center">
    <thead>
        <tr>
            <th width="1%">NO</th>
            <th>No Pasien</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Tgl Buat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $item)
            <tr>
                <td>{{ request()->get('per_page') == 'all'
                    ? $loop->iteration
                    : ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}
                </td>
                <td>{{ $item->no_pasien }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->umur }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->created_at->format('d/m/Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>Total Data: {{ request()->get('per_page') == 'all' ? $models->count() : $models->total() }}</p>
@if (request()->get('per_page') != 'all')
    {!! $models->links() !!}
@endif
