@extends('layouts.admin')

@section('content')
<h1 class="mb-4">Dashboard</h1>
<div class="row g-3">
    <div class="col-md-3"><div class="card"><div class="card-body"><h6>Categories</h6><h3>{{ $stats['categories'] }}</h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><h6>Products</h6><h3>{{ $stats['products'] }}</h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><h6>Orders</h6><h3>{{ $stats['orders'] }}</h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><h6>Revenue</h6><h3>${{ number_format($stats['revenue'], 2) }}</h3></div></div></div>
</div>
@endsection
