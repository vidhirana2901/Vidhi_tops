@extends('layouts.app')

@section('title', 'Restaurant Menu')

@section('content')
    <div class="container py-5">
        <section class="hero-panel p-4 p-md-5 mb-5 shadow-sm">
            <div class="row align-items-end g-4">
                <div class="col-lg-8">
                    <p class="text-uppercase small fw-semibold mb-2 opacity-75">Today at Table&amp;Thyme</p>
                    <h1 class="display-5 fw-bold mb-3">Good ingredients. No fuss.</h1>
                    <p class="lead mb-0">A short, seasonal menu made to bring people back to the table.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="btn btn-light px-4" href="{{ route('orders.create') }}">Start your order</a>
                </div>
            </div>
        </section>
        <div class="d-flex justify-content-between align-items-end mb-3">
            <div>
                <p class="text-uppercase text-secondary small fw-semibold mb-1">Our selection</p>
                <h2 class="h3 mb-0">The menu</h2>
            </div>
            <span class="text-secondary small">{{ $menuItems->flatten()->count() }} dishes</span>
        </div>
        <div class="content-card shadow-sm p-2 p-md-4">
            <div class="table-responsive">
                <table class="table menu-table mb-0">
                    <thead>
                        <tr><th class="ps-3">Item Name</th><th>Restaurant</th><th>Category</th><th class="text-end pe-3">Price</th></tr>
                    </thead>
                    <tbody>
                        @forelse ($menuItems as $category => $categoryItems)
                            <tr><th colspan="4" class="ps-3 pt-4">{{ $category }}</th></tr>
                            @foreach ($categoryItems as $menuItem)
                                <tr>
                                    <td class="ps-3 py-3 fw-semibold">{{ $menuItem->name }} @if (!$menuItem->is_available)<span class="text-secondary small">(Unavailable)</span>@endif</td>
                                    <td>{{ $menuItem->restaurant?->name ?? 'Restaurant not assigned' }}</td>
                                    <td><span class="badge rounded-pill category-pill px-3 py-2">{{ $menuItem->category }}</span></td>
                                    <td class="text-end pe-3 price">${{ number_format((float) $menuItem->price, 2) }}</td>
                                </tr>
                            @endforeach
                        @empty
                            <tr><td colspan="4" class="ps-3 py-4 text-secondary">No menu items available yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection