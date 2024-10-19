<!-- resources/views/customer/search.blade.php -->
@extends('layouts.app')

@section('content')
<h1 Style="color:white"><center>Search E-Catering</center></h1>
<form action="{{ route('customer.search') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Search" required>
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>

<h1 Style="color:white"><center>Avaible Menu</center></h1>
<ul class="list-group">
    @foreach($menus as $menu)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $menu->name }} - {{ $menu->price }}
            <form action="{{ route('customer.placeOrder') }}" method="POST" class="form-inline">
                @csrf
                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                <input type="number" name="quantity" min="1" class="form-control mx-2" required placeholder="Qty">
                <input type="date" name="delivery_date" class="form-control mx-2" required>
                <button type="submit" class="btn btn-success btn-sm">Order</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
