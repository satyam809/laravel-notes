<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
<h2>Products List</h2>
<a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection