<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
<h2>Add New Product</h2>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" class="form-control" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" class="form-control" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection