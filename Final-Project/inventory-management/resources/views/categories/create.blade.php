

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Category</h2>

        <form method="post" action="{{ route('categories.store') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
