@extends('admin.layout.layout')

@section('container')
<!-- MAIN CONTENT AREA -->
<main id="main-content">
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="stat-card p-4">
                <span class="text-muted small fw-bold text-uppercase">Total Products</span>
                <h2 class="fw-bold m-0 mt-2" style="color: var(--navy-main);">128</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card p-4">
                <span class="text-muted small fw-bold text-uppercase">Total Customers</span>
                <h2 class="fw-bold m-0 mt-2" style="color: var(--navy-main);">45</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card p-4">
                <span class="text-muted small fw-bold text-uppercase">Active Brands</span>
                <h2 class="fw-bold m-0 mt-2" style="color: var(--navy-main);">14</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card p-4">
                <span class="text-muted small fw-bold text-uppercase">Pending Inquiries</span>
                <h2 class="fw-bold text-danger m-0 mt-2">3</h2>
            </div>
        </div>
    </div>
</main>
@endsection