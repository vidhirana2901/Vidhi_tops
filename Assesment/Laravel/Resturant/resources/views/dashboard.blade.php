@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container py-5">
        @if (session('status'))
            <div class="alert alert-success" role="alert">{{ session('status') }}</div>
        @endif
        <div class="hero-panel p-4 p-md-5 mb-4">
            <p class="text-uppercase small fw-semibold opacity-75 mb-2">Your table</p>
            <h1 class="display-6 fw-bold">Welcome back</h1>
            <p class="lead mb-0">Everything tastes better when the details are taken care of.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="content-card h-100 p-4 shadow-sm">
                    <h2 class="h4">Ready for dinner?</h2>
                    <p class="text-secondary">Browse today's dishes and send your next order to the kitchen.</p>
                    <a class="btn btn-coral" href="{{ route('menu.index') }}">View menu</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-card h-100 p-4 shadow-sm">
                    <h2 class="h4">Track your orders</h2>
                    <p class="text-secondary">See recent orders and their latest status in one place.</p>
                    <a class="btn btn-outline-dark" href="{{ route('orders.index') }}">View orders</a>
                </div>
            </div>
        </div>
    </div>
@endsection