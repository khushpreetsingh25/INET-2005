

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Item</h2>

        <form method="post" action="{{ route('items.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Category -->
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Title -->
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Price -->
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
                @error('price')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Quantity -->
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
                @error('quantity')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- SKU -->
            <div class="form-group">
                <label for="sku">SKU:</label>
                <input type="text" name="sku" class="form-control" value="{{ old('sku') }}" required>
                @error('sku')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Picture -->
            <div class="form-group">
                <label for="picture">Picture:</label>
                <input type="file" name="picture" class="form-control" required>
                @error('picture')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>

        </form>
    </div>
@endsection
