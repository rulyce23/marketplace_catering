<!-- resources/views/customer/order.blade.php -->
@extends('layouts.app')

@section('content')
<h1 Style="color:white"><center>Your Orders History</center></h1>
<div class="card">
    <div class="card-body">
        <ul class="list-group">
            @foreach($orders as $order)
                <li class="list-group-item">
                    Menu: {{ $order->menu->name }} | Quantity: {{ $order->quantity }} | Total: {{ $order->total_price }} | Delivery Date: {{ $order->delivery_date }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
