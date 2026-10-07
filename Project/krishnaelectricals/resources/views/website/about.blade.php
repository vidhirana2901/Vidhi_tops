@extends('website.layout.layout')

@section('container')

<!-- Page Hero Header -->
<div class="py-5 text-white" style="background: linear-gradient(90deg, #0B2545 0%, #06172E 100%);">
    <div class="container text-center">
        <h1 class="fw-bold display-5 mb-2">About Krishna Electricals</h1>
        <p class="lead mb-0 text-light">Serving Maninagar & Ahmedabad with Certified Electrical Supplies Since 1990</p>
    </div>
</div>

<div class="container my-5">
    <div class="row align-items-center g-5 mb-5">
        <div class="col-lg-6">
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold text-uppercase mb-3">Our Legacy</span>
            <h2 class="fw-bold mb-3" style="color: var(--primary-blue);">Empowering Homes & Industries with Safe Electrical Hardware</h2>
            <p class="lead">Managed under the direction of <strong>Shripur Rana (Lalabhai)</strong>, Krishna Electricals has established itself as one of the most reliable authorized stockists in Ahmedabad.</p>
            <p class="text-muted">Located at Shop-7 K.B. Complex, Rambag, Maninagar, we cater to electrical contractors, builders, industrial technicians, and individual homeowners requiring genuine electrical goods backed by manufacturer warranties.</p>
            
            <div class="row g-3 mt-2">
                <div class="col-sm-6">
                    <div class="p-3 bg-white rounded shadow-sm border-start border-4 border-warning">
                        <h4 class="fw-bold mb-1" style="color: var(--primary-blue);">30+ Years</h4>
                        <small class="text-muted">Industry Experience & Trust</small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="p-3 bg-white rounded shadow-sm border-start border-4 border-primary">
                        <h4 class="fw-bold mb-1" style="color: var(--primary-blue);">100% Genuine</h4>
                        <small class="text-muted">Authorized Brand Distribution</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm p-4 bg-white">
                <h4 class="fw-bold mb-3" style="color: var(--primary-blue);"><i class="bi bi-shield-check text-warning me-2"></i> Why Choose Krishna Electricals?</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-0 bg-transparent"><strong>Authorized Sourcing:</strong> Direct ties with Polycab, RR Kábel, Havells, L&T, Crompton, and Syska.</li>
                    <li class="list-group-item px-0 bg-transparent"><strong>Wholesale & Retail:</strong> Competitive tier pricing for contractor bulk orders and retail customers.</li>
                    <li class="list-group-item px-0 bg-transparent"><strong>GST Compliant Invoicing:</strong> Official billing available for business input tax credit (ITC).</li>
                    <li class="list-group-item px-0 bg-transparent"><strong>Prompt Local Supply:</strong> Quick local dispatch for site construction wires and heavy switchgears.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

 @endsection