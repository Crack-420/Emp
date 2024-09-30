<!-- resources/views/artisans/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Artisan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('artisans.update', $artisan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Artisan Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $artisan->name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $artisan->email) }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $artisan->phone) }}">
        </div>

        <div class="mb-3">
            <label for="skill" class="form-label">Skill</label>
            <input type="text" name="skill" class="form-control" value="{{ old('skill', $artisan->skill) }}">
        </div>

        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select name="customer_id" class="form-control">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $customer->id == $artisan->customer_id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Artisan</button>
    </form>
</div>
@endsection
