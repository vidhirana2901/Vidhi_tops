@extends('admin.layout.layout')

@section('container')
<main id="main-content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-custom p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0" style="color: var(--navy-main);">
                        <i class="bi bi-box-seam me-2"></i>Edit Product
                    </h5>
                    <a href="{{ url('admin/view_products') }}" class="btn btn-light border btn-sm">Back</a>
                </div>

                <form id="editProductForm" method="post" action="{{ url('admin/update_product/' . $edit_product->id) }}">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Product Name *</label>
                            <input type="text" id="prodName" name="product_name" value="{{ old('product_name', $edit_product->product_name) }}" class="form-control" placeholder="e.g. Havells 1.5 Sq mm Wire" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Category *</label>
                            <select id="prodCategory" name="category_id" class="form-select" required>
                                <option value="">Select Category</option>
                                <option value="1" {{ old('category_id', $edit_product->category_id) == 1 ? 'selected' : '' }}>Wires & Cables</option>
                                <option value="2" {{ old('category_id', $edit_product->category_id) == 2 ? 'selected' : '' }}>Switches & Sockets</option>
                                <option value="3" {{ old('category_id', $edit_product->category_id) == 3 ? 'selected' : '' }}>Lighting & Fixtures</option>
                                <option value="4" {{ old('category_id', $edit_product->category_id) == 4 ? 'selected' : '' }}>Electrical Accessories</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Selling Price (₹) *</label>
                            <input type="number" id="prodPrice" name="price" value="{{ old('price', $edit_product->price) }}" class="form-control" placeholder="1500" step="0.01" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Initial Stock Quantity *</label>
                            <input type="number" id="prodStock" name="stock_quantity" value="{{ old('stock_quantity', $edit_product->stock_quantity) }}" class="form-control" placeholder="50" required>
                        </div>

                        <div class="col-12 mt-4 text-end">
                            <a href="{{ url('admin/view_products') }}" class="btn btn-light border me-2">Cancel</a>
                            <button type="submit" class="btn btn-orange px-4">Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
