@extends('layouts.app')

@section('content')
<h1 style="color:white"><center>Customer Orders</center></h1>

<div class="card">
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="mt-4">Existing Orders</h2>
        @if (empty($orders))
            <p>No orders found.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Merchant ID</th>
                        <th>Customer ID</th>
                        <th>Menu ID</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Delivery Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ $order['merchant_id'] }}</td>
                            <td>{{ $order['customer_id'] }}</td>
                            <td>{{ $order['menu_id'] }}</td>
                            <td>{{ $order['quantity'] }}</td>
                            <td>{{ ucfirst($order['status']) }}</td>
                            <td>{{ $order['delivery_date'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
