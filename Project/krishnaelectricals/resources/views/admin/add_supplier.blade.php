@extends('admin.layout.layout')

@section('container')
<main id="main-content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-custom p-4">
                <h5 class="fw-bold mb-3" style="color: var(--navy-main);"><i class="bi bi-truck me-2"></i>Register New Supplier</h5>
                <form id="addSupplierForm" method="post" action="{{ url('admin/submit-supplier') }}">
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
                            <label class="form-label fw-semibold">Company / Brand Name *</label>
                          <input type="text" id="supName" name="supplier_name" value="{{ old('supplier_name') }}" class="form-control" placeholder="e.g. Havells India Ltd."  >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Contact Person Name *</label>
                            <input type="text" id="supContact" name="contact_person" value="{{ old('contact_person') }}" class="form-control" placeholder="Representative Name"  >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone Number *</label>
                            <input type="tel" id="supPhone" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="+91 98765 00000" >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">GSTIN Number</label>
                            <input type="text" id="supGst" name="gstin" value="{{ old('gstin') }}" class="form-control" placeholder="24XXXXXXXXXX1Z5">
                        </div>
                        <div class="col-12 mt-4 text-end">
                            <a href="{{ url('admin/view_suppliers') }}" class="btn btn-light border me-2">Cancel</a>
                            <button type="submit" class="btn btn-orange px-4">Save Supplier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection