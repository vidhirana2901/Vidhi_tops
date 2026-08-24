@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <div class="container py-5">
        <a class="text-secondary small" href="{{ route('orders.index') }}">&larr; Back to orders</a>
        <div class="content-card shadow-sm p-4 p-md-5 mt-3">
            <div class="d-flex justify-content-between align-items-start mb-4"><div><p class="text-uppercase text-secondary small fw-semibold mb-1">Order details</p><h1 class="h2 mb-0">Order #{{ $order->id }}</h1></div><span class="badge rounded-pill category-pill px-3 py-2">{{ ucfirst($order->status) }}</span></div>
            <dl class="row"><dt class="col-sm-4 text-secondary fw-normal">Restaurant</dt><dd class="col-sm-8">{{ $order->restaurant->name }}</dd><dt class="col-sm-4 text-secondary fw-normal">Delivery address</dt><dd class="col-sm-8">{{ $order->delivery_address }}</dd><dt class="col-sm-4 text-secondary fw-normal">Total amount</dt><dd class="col-sm-8 price">${{ number_format((float) $order->total_amount, 2) }}</dd></dl>
            <h2 class="h5 mt-4">Items</h2><ul class="mb-0">@forelse ($order->orderItems as $item)<li>{{ $item->quantity }} × {{ $item->menuItem->name }} at ${{ number_format((float) $item->price, 2) }}</li>@empty<li>No item details recorded.</li>@endforelse</ul>
        </div>
    </div>
@endsection