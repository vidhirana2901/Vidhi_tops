@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div><p class="text-uppercase text-secondary small fw-semibold mb-1">Your history</p><h1 class="h2 mb-0">Orders</h1></div>
            <a class="btn btn-coral" href="{{ route('orders.create') }}">New order</a>
        </div>
        <div class="content-card shadow-sm p-4">
            @forelse ($orders as $order)
                <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                    <div><a class="fw-semibold text-dark" href="{{ route('orders.show', $order->id) }}">Order #{{ $order->id }}</a><div class="text-secondary small">{{ $order->restaurant->name }} · {{ $order->created_at->format('M j, Y') }}</div><div class="small">{{ $order->orderItems->count() }} item(s)</div></div>
                    <span class="badge rounded-pill category-pill px-3 py-2">{{ ucfirst($order->status) }}</span>
                </div>
            @empty
                <p class="text-secondary mb-0">No orders yet. Your next meal is a click away.</p>
            @endforelse
        </div>
    </div>
@endsection