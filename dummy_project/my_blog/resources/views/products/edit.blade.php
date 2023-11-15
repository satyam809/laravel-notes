<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
<h2>Edit Product</h2>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" class="form-control" rows="4" required>{{ $product->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection