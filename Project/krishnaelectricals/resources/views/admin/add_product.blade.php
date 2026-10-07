@extends('admin.layout.layout')

@section('container')
<main id="main-content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-custom p-4">
                <h5 class="fw-bold mb-3" style="color: var(--navy-main);"><i class="bi bi-box-seam me-2"></i>Add New Electrical Product</h5>
                <form id="addProductForm" method="post" action="{{ url('admin/submit-product') }}">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif    
                @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Product Name *</label>
                            <input type="text" id="prodName" name="product_name" value="{{ old('product_name') }}" class="form-control" placeholder="e.g. Havells 1.5 Sq mm Wire" >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Category *</label>
                            <select id="prodCategory" name="category_id" value="{{ old('category_id') }}" class="form-select"  >
                                <option value="">Select Category</option>
                                 <option value="1">Wires & Cables</option>
                                <option value="2">Switches & Sockets</option>
                                <option value="3">Lighting & Fixtures</option>
                                <option value="4">Electrical Accessories</option>
                                
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Selling Price (₹) *</label>
                            <input type="number" id="prodPrice" name="price" value="{{ old('price') }}" class="form-control" placeholder="1500"  >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Initial Stock Quantity *</label>
                            <input type="number" id="prodStock" name="stock_quantity" value="{{ old('stock_quantity') }}" class="form-control" placeholder="50"  >
                        </div>
                        <div class="col-12 mt-4 text-end">
                            <a href="{{ url('admin/view_products') }}" class="btn btn-light border me-2">Cancel</a>
                            <button type="submit" class="btn btn-orange px-4">Save Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection