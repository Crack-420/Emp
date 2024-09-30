<!-- resources/views/artisans/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Artisans List</h1>
    <a href="{{ route('artisans.create') }}" class="btn btn-primary mb-3">Add New Artisan</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Skill</th>
                <th>Customer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artisans as $artisan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $artisan->name }}</td>
                <td>{{ $artisan->email }}</td>
                <td>{{ $artisan->phone }}</td>
                <td>{{ $artisan->skill }}</td>
                <td>{{ $artisan->customer->name }}</td>
                <td>
                    <a href="{{ route('artisans.show', $artisan->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('artisans.edit', $artisan->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('artisans.destroy', $artisan->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this artisan?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
