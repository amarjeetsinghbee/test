@extends('layouts.admin')

@section('content')
<h1>Categories</h1>
<form method="POST" action="{{ route('admin.categories.store') }}" class="row g-2 mb-4">
    @csrf
    <div class="col-md-3"><input class="form-control" name="name" placeholder="Category name" required></div>
    <div class="col-md-5"><input class="form-control" name="description" placeholder="Description"></div>
    <div class="col-md-2"><button class="btn btn-primary">Add Category</button></div>
</form>
<table class="table table-bordered bg-white">
    <thead><tr><th>Name</th><th>Description</th><th>Status</th><th>Action</th></tr></thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->is_active ? 'Active' : 'Inactive' }}</td>
            <td>
                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $categories->links() }}
@endsection
