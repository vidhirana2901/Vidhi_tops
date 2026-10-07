@extends('admin.layout.layout')

@section('container')
<main id="main-content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-custom p-4">
                <h5 class="fw-bold mb-3" style="color: var(--navy-main);"><i class="bi bi-person-plus me-2"></i>Add New Customer / Contractor</h5>
                <form id="addCustomerForm" method="post" action="{{ url('admin/submit-customer') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Customer Full Name *</label>
                            <input type="text" name="customer_name" id="custName" class="form-control" placeholder="e.g. Ramesh Patel" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Customer Type *</label>
                            <select name="customer_type" id="custType" class="form-select" required>
                                <option value="Retail">Retail Client</option>
                                <option value="Contractor">Electrical Contractor</option>
                                <option value="Wholesale">Wholesale Buyer</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone Number *</label>
                            <input type="tel" name="customer_phone" id="custPhone" class="form-control" placeholder="+91 98250 00000" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">City / Area</label>
                            <input type="text" name="customer_location"  id="custLocation" class="form-control" value="Maninagar, Ahmedabad">
                        </div>
                        <div class="col-12 mt-4 text-end">
                            <a href="{{ url('admin/view_customers') }}" class="btn btn-light border me-2">Cancel</a>
                            <button type="submit" class="btn btn-orange px-4">Register Customer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


@endsection