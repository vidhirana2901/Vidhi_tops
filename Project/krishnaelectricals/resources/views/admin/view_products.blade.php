@extends('admin.layout.layout')

@section('container')
<main id="main-content">
    <div class="card-custom p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold m-0" style="color: var(--navy-main);">Electrical Inventory Products</h5>
                <small class="text-muted">Manage stock and price lists</small>
            </div>
            <a href="{{ url('admin/add_product') }}" class="btn btn-orange btn-sm"><i class="bi bi-plus-lg me-1"></i> Add Product</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price (₹)</th>
                        <th>Stock Qty</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="productTableBody">
                    @foreach($products as $prod)
                    <tr>
                    <td>#PRD-{{ $prod->id }}</td>
                    <td><strong>{{ $prod->product_name }}</strong></td>
                    <td><span class="badge bg-light text-dark border">{{ $prod->category_id }}</span></td>
                    <td>₹{{ $prod->price }}</td>
                    <td><span class="badge {{ $prod->stock > 10 ? 'bg-success' : 'bg-danger' }}">{{ $prod->stock_quantity }} units</span></td>
                    <td class="text-center">
                      <a href="{{ url('admin/edit_product/' . $prod->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                      <a href="{{ url('admin/delete_product/' . $prod->id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</main>

@endsection