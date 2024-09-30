<!-- resources/views/customers/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Customer Details</h1>

    <div class="mb-3">
        <strong>Name:</strong> {{ $customer->name }}
    </div>

    <div class="mb-3">
        <strong>Email:</strong> {{ $customer->email }}
    </div>

    <div class="mb-3">
        <strong>Phone:</strong> {{ $customer->phone }}
    </div>

    <div class="mb-3">
        <strong>Address:</strong> {{ $customer->address ?? 'No address provided' }}
    </div>

    <h2>Artisans</h2>
    @if($customer->artisans->isEmpty())
        <p>No artisans assigned to this customer.</p>
    @else
        <ul>
            @foreach($customer->artisans as $artisan)
                <li>{{ $artisan->name }} ({{ $artisan->skill }})</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
