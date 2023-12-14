

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Category</h2>

        <form method="post" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
@endsection
