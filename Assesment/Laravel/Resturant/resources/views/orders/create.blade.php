@extends('layouts.app')

@section('title', 'Place Order')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center"><div class="col-lg-7">
            <div class="content-card p-4 p-md-5 shadow-sm">
                <p class="text-uppercase text-secondary small fw-semibold mb-2">From our kitchen</p><h1 class="h2 mb-4">Place an order</h1>
                <form method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    @if (session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
                    <div class="mb-3"><label class="form-label" for="restaurant_id">Restaurant</label><select class="form-select" id="restaurant_id" name="restaurant_id" required><option value="">Choose a restaurant</option>@foreach ($restaurants as $restaurant)<option value="{{ $restaurant->id }}" @selected(old('restaurant_id') == $restaurant->id)>{{ $restaurant->name }}</option>@endforeach</select>@error('restaurant_id')<div class="text-danger small">{{ $message }}</div>@enderror</div>
                    <div class="mb-3"><label class="form-label" for="delivery_address">Delivery address</label><input class="form-control" id="delivery_address" name="delivery_address" type="text" minlength="10" value="{{ old('delivery_address') }}" required>@error('delivery_address')<div class="text-danger small">{{ $message }}</div>@enderror</div>
                    <div class="mb-4"><label class="form-label" for="total_amount">Total amount</label><div class="input-group"><span class="input-group-text">$</span><input class="form-control" id="total_amount" name="total_amount" type="number" min="0.01" step="0.01" value="{{ old('total_amount') }}" required></div>@error('total_amount')<div class="text-danger small">{{ $message }}</div>@enderror</div>
                    <button class="btn btn-coral px-4" type="submit">Place order</button>
                </form>
            </div>
        </div></div>
    </div>
@endsection