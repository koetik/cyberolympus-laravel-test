@extends('layouts.app')

@section('content')
<div class="row justify-content-center px-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Order</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <form class="form" action="{{ route('order.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-6 text-right"></div>
                                <div class="col-md-6 text-right">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search....." name="search">
                                        <div class="input-group-append">
                                          <button class="btn btn-outline-secondary" type="submit">Go</button>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Invoice</th>
                            <th>Cutomer Name</th>
                            <th>Agent Name</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ ($items->currentpage()-1) * $items->perpage() + $loop->index + 1 }}</td>
                            <td>{{ $item->invoice_id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->agent_name }}</td>
                            <td>{{ $item->payment_final }}</td>
                            <td>{{ $item->status_name }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('order.show', $item) }}">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $items->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection