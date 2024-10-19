<!-- resources/views/merchant/menu.blade.php -->
@extends('layouts.app')

@section('content')
<h1 style="color:white"><center>Manage Menu</center></h1>

<div class="card">
    <div class="card-body">
        <form action="{{ route('merchant.createMenu') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Menu Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Add Menu</button>
        </form>
    </div>
</div>

<h2 class="mt-4">Existing Menus</h2>
<ul class="list-group">
    @foreach($menus as $menu)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $menu->name }} - {{ $menu->price }}
            <form action="{{ route('merchant.deleteMenu', $menu->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
