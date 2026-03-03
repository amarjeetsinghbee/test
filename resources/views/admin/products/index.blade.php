@extends('layouts.admin')

@section('content')
<h1>Products</h1>
<form method="POST" action="{{ route('admin.products.store') }}" class="row g-2 mb-4">
    @csrf
    <div class="col-md-2">
        <select name="category_id" class="form-select" required>
            <option value="">Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2"><input class="form-control" name="name" placeholder="Product" required></div>
    <div class="col-md-2"><input class="form-control" name="sku" placeholder="SKU" required></div>
    <div class="col-md-2"><input class="form-control" name="price" placeholder="Price" type="number" step="0.01" required></div>
    <div class="col-md-2"><input class="form-control" name="stock" placeholder="Stock" type="number" required></div>
    <div class="col-md-2"><button class="btn btn-primary">Add Product</button></div>
</form>
<table class="table table-bordered bg-white">
    <thead><tr><th>Name</th><th>SKU</th><th>Category</th><th>Price</th><th>Stock</th><th>Action</th></tr></thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->category->name }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products->links() }}
@endsection
