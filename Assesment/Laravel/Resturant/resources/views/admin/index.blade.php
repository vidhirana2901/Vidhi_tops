@extends('layouts.app')

@section('title', 'Admin')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div><p class="text-uppercase text-secondary small fw-semibold mb-1">Administration</p><h1 class="h2 mb-0">Restaurants and menu</h1></div>
            @if (session('status'))<span class="alert alert-success py-2 mb-0">{{ session('status') }}</span>@endif
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="content-card p-4 shadow-sm mb-4">
                    <h2 class="h5">Add restaurant</h2>
                    <form method="POST" action="{{ route('admin.restaurants.store') }}">@csrf
                        <label class="form-label" for="restaurant_name">Name</label>
                        <input class="form-control mb-3" id="restaurant_name" name="name" required>
                        @error('name')<div class="text-danger small mb-2">{{ $message }}</div>@enderror
                        <button class="btn btn-coral" type="submit">Create restaurant</button>
                    </form>
                </div>
                <div class="content-card p-4 shadow-sm">
                    <h2 class="h5">Add menu item</h2>
                    <form method="POST" action="{{ route('admin.menu-items.store') }}">@csrf
                        <label class="form-label" for="restaurant_id">Restaurant</label>
                        <select class="form-select mb-2" id="restaurant_id" name="restaurant_id" required>@foreach ($restaurants as $restaurant)<option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>@endforeach</select>
                        <label class="form-label" for="name">Name</label><input class="form-control mb-2" id="name" name="name" required>
                        <label class="form-label" for="category">Category</label><input class="form-control mb-2" id="category" name="category" required>
                        <label class="form-label" for="price">Price</label><input class="form-control mb-3" id="price" name="price" type="number" min="0" step="0.01" required>
                        <div class="form-check mb-3"><input class="form-check-input" id="is_available" name="is_available" type="checkbox" value="1" checked><label class="form-check-label" for="is_available">Available</label></div>
                        <button class="btn btn-coral" type="submit">Create menu item</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="content-card p-4 shadow-sm">
                    <h2 class="h5">Current menu</h2>
                    <div class="table-responsive"><table class="table align-middle"><thead><tr><th>Name</th><th>Restaurant</th><th>Category</th><th>Price</th><th>Availability</th><th></th></tr></thead><tbody>
                        @forelse ($menuItems as $menuItem)
                            <tr><td>{{ $menuItem->name }}</td><td>{{ $menuItem->restaurant->name }}</td><td>{{ $menuItem->category }}</td><td>${{ number_format((float) $menuItem->price, 2) }}</td><td>{{ $menuItem->is_available ? 'Available' : 'Unavailable' }}</td><td><form method="POST" action="{{ route('admin.menu-items.destroy', $menuItem) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" type="submit">Delete</button></form></td></tr>
                        @empty <tr><td colspan="6" class="text-secondary">No menu items yet.</td></tr> @endforelse
                    </tbody></table></div>
                </div>
            </div>
        </div>
    </div>
@endsection
