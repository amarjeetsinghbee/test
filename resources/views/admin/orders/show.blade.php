@extends('layouts.admin')
@section('content')<h1>Order {{ $order->order_number }}</h1><p>Status: {{ $order->status }}</p>@endsection
