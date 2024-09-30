<!-- resources/views/artisans/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Artisan Details</h1>

    <div class="mb-3">
        <strong>Name:</strong> {{ $artisan->name }}
    </div>

    <div class="mb-3">
        <strong>Email:</strong> {{ $artisan->email }}
    </div>

    <div class="mb-3">
        <strong>Phone:</strong> {{ $artisan->phone }}
    </div>

    <div class="mb-3">
        <strong>Skill:</strong> {{ $artisan->skill }}
    </div>

    <div class="mb-3">
        <strong>Customer:</strong> {{ $artisan->customer->name }}
    </div>

    <a href="{{ route('artisans.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
