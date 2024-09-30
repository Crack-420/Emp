<!-- resources/views/customers/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Customer</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Customer Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $customer->phone) }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address (Optional)</label>
            <textarea name="address" class="form-control">{{ old('address', $customer->address) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Customer</button>
    </form>
</div>
@endsection
