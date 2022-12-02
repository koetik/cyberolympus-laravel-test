@extends('layouts.app')

@section('content')
<div class="row justify-content-center px-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Order</div>
            <div class="card-body">
                <table class="table table-bordered mb-5">
                    <tbody>
                        @foreach($item->field_name as $fields)
                            <tr>
                                <td>{{ $fields['name'] }}</td>
                                <td>{{ $item->{$fields['column']} }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>Status</td>
                            <td>{{ $item->status_name }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tbody>
                            @foreach($item->orderDetail as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->product->product_name }}</td>
                                    <td>{{ $detail->product->productCategory->name }}</td>
                                    <td class="text-right">{{ number_format($detail->total_price) }}</td>
                                    <td class="text-right">{{ number_format($detail->qty) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-center">Total</td>
                                <td class="text-right">{{ number_format($detail->sum('total_price')) }}</td>
                                <td class="text-right">{{ number_format($detail->qty) }}</td>
                            </tr>
                        </tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection