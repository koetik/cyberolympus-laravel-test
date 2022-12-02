<table class="table table-bordered" style="font-size:12px">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Phone</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ ($items->currentpage()-1) * $items->perpage() + $loop->index + 1 }}</td>
            <td>{{ $item->full_name }}</td>
            <td>{{ $item->customer->address }}</td>
            <td>{{ $item->phone }}</td>
            <td>
                <a class="btn btn-sm btn-primary edit-form" 
                data-ref="{{ $item->first_name }}|{{ $item->customer->address }}|{{ $item->phone }}" 
                href="{{ route('customer.show', $item) }}">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $items->withQueryString()->links() }}