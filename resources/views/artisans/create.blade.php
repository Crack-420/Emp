<!-- resources/views/artisans/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Artisan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('artisans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Artisan Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <div class="mb-3">
            <label for="skill" class="form-label">Skill</label>
            <input type="text" name="skill" class="form-control" value="{{ old('skill') }}">
        </div>

        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select name="customer_id" class="form-control">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add Artisan</button>
    </form>
</div>
@endsection
