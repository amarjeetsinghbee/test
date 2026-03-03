@extends('layouts.admin')

@section('content')
<h1>Orders</h1>
<table class="table table-bordered bg-white">
    <thead><tr><th>Order #</th><th>Customer</th><th>Status</th><th>Total</th><th>Items</th></tr></thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->order_number }}</td>
            <td>{{ $order->customer_name }}<br><small>{{ $order->customer_email }}</small></td>
            <td>{{ ucfirst($order->status) }}</td>
            <td>${{ number_format($order->total_amount, 2) }}</td>
            <td>{{ $order->items_count }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $orders->links() }}
@endsection
