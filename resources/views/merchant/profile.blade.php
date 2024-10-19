<!-- resources/views/merchant/profile.blade.php -->
@extends('layouts.app')

@section('content')
<h1 style="color:white"><center>Merchant Profile</center></h1>

    @if(isset($merchant))
        <form action="{{ route('merchant.updateProfile') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $merchant->company_name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required>{{ old('description', $merchant->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $merchant->address) }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $merchant->phone) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    @else
        <p>Merchant profile not found.</p>
    @endif
@endsection
