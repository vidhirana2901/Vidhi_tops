@extends('website.layout.layout')

@section('container')
<div class="py-4 text-white" style="background: linear-gradient(90deg, #0B2545 0%, #06172E 100%);">
    <div class="container text-center">
        <h1 class="fw-bold mb-1">Our Services & Executed Projects</h1>
        <p class="mb-0 text-light">Professional contracting solutions and commercial electrical supply execution.</p>
    </div>
</div>

<div class="container my-5">
    <h3 class="fw-bold mb-4" style="color: var(--primary-blue);">Key Electrical Contracting Services</h3>
    
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm p-3 text-center">
                <i class="bi bi-tools display-4 text-warning mb-3"></i>
                <h5 class="fw-bold">Wiring & Installations</h5>
                <p class="small text-muted">Complete residential building wiring, earthing setups, and main line cabling.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm p-3 text-center">
                <i class="bi bi-box-seam display-4 text-warning mb-3"></i>
                <h5 class="fw-bold">Control Panel Building</h5>
                <p class="small text-muted">Custom motor control center (MCC) panels and sub-distribution board fabrication.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm p-3 text-center">
                <i class="bi bi-shield-check display-4 text-warning mb-3"></i>
                <h5 class="fw-bold">Earthing Systems</h5>
                <p class="small text-muted">Chemical earthing, copper electrode installation, and lightning protection systems.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm p-3 text-center">
                <i class="bi bi-file-earmark-text display-4 text-warning mb-3"></i>
                <h5 class="fw-bold">Annual AMC Contracts</h5>
                <p class="small text-muted">Annual maintenance contracts for residential societies, schools, and small factories.</p>
            </div>
        </div>
    </div>
</div>
 @endsection