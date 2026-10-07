@extends('admin.layout.layout')

@section('container')
<main id="main-content">
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold m-0" style="color: var(--navy-main);">Edit Supplier</h4>
                <small class="text-muted">Update the supplier details for Krishna Electricals</small>
            </div>
            <a href="{{ url('admin/view_suppliers') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back to Suppliers
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-custom p-4">
                    <form action="{{ url('admin/update-supplier/' . $supplier->id) }}" method="post">
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
                                <label class="form-label fw-semibold">Company / Brand Name <span class="text-danger">*</span></label>
                                <input type="text" name="supplier_name" class="form-control" value="{{ old('supplier_name', $supplier->supplier_name) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Contact Person Name <span class="text-danger">*</span></label>
                                <input type="text" name="contact_person" class="form-control" value="{{ old('contact_person', $supplier->contact_person) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" class="form-control" value="{{ old('phone', $supplier->phone) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">GSTIN Number</label>
                                <input type="text" name="gstin" class="form-control" value="{{ old('gstin', $supplier->gstin) }}">
                            </div>

                            <div class="col-12 mt-4 text-end">
                                <a href="{{ url('admin/view_suppliers') }}" class="btn btn-light border me-2">Cancel</a>
                                <button type="submit" class="btn btn-orange px-4">
                                    <i class="bi bi-check-lg me-1"></i> Update Supplier
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
