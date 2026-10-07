@extends('website.layout.layout')

@section('container')

<div class="py-4 text-white" style="background: linear-gradient(90deg, #0B2545 0%, #06172E 100%);">
    <div class="container text-center">
        <h1 class="fw-bold mb-1">Expanded Product Catalog</h1>
        <p class="mb-0 text-light">Browse authentic electrical supplies with uniform specifications.</p>
    </div>
</div>

<div class="container my-5">
    <!-- Filter Controls -->
    <div class="row justify-content-center g-3 mb-5">
        <div class="col-md-6">
            <div class="input-group shadow-sm">
                <span class="input-group-text bg-white"><i class="bi bi-search text-primary"></i></span>
                <input type="text" id="brandSearch" class="form-control form-control-lg" placeholder="Search by name, brand, or specs...">
            </div>
        </div>
        <div class="col-md-3">
            <select id="categoryFilter" class="form-select form-select-lg shadow-sm">
                <option value="all">All Categories</option>
                <option value="wires">Wires & Armoured Cables</option>
                <option value="switchgear">Switchgear & MCB</option>
                <option value="lighting">LED Lighting</option>
                <option value="fans">Fans & Appliances</option>
                <option value="industrial">Industrial Controls & Starters</option>
            </select>
        </div>
    </div>

    <!-- Uniform Product Grid -->
    <div class="row g-4" id="brandList">

        <!-- Item 1: Wires -->
        <div class="col-lg-4 col-md-6 brand-item" data-category="wires">
            <div class="card h-100 border-0 shadow-sm overflow-hidden">
                <div class="product-card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=500&q=80" class="product-card-img" alt="Polycab FR-LSH Copper Wires">
                </div>
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-primary mb-2 w-auto align-self-start">Wires & Cables</span>
                    <h5 class="fw-bold text-dark">Polycab FR-LSH Copper Wires</h5>
                    <p class="small text-muted">Flame retardant low smoke wire for residential wiring.</p>
                    <ul class="list-unstyled small mb-3">
                        <li><i class="bi bi-check2 text-success me-1"></i>Sizes: 0.75 sq mm to 10 sq mm</li>
                        <li><i class="bi bi-check2 text-success me-1"></i>90 Meter Standard Coils</li>
                    </ul>
                    <a href="https://wa.me/919426514227?text=Quote%20Request%3A%20Polycab%20FR-LSH%20Wires" class="btn btn-outline-success btn-sm w-100 fw-bold mt-auto" target="_blank"><i class="bi bi-whatsapp me-1"></i> Get Price Quote</a>
                </div>
            </div>
        </div>

        <!-- Item 2: Armoured Cables -->
        <div class="col-lg-4 col-md-6 brand-item" data-category="wires">
            <div class="card h-100 border-0 shadow-sm overflow-hidden">
                <div class="product-card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?auto=format&fit=crop&w=500&q=80" class="product-card-img" alt="RR KÁBEL Armoured Power Cables">
                </div>
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-primary mb-2 w-auto align-self-start">Wires & Cables</span>
                    <h5 class="fw-bold text-dark">RR KÁBEL Armoured Power Cables</h5>
                    <p class="small text-muted">Heavy-duty 3.5 Core & 4 Core XLPE insulated cables.</p>
                    <ul class="list-unstyled small mb-3">
                        <li><i class="bi bi-check2 text-success me-1"></i>Aluminum & Copper Conductors</li>
                        <li><i class="bi bi-check2 text-success me-1"></i>IS 7098 Certified Heavy Duty</li>
                    </ul>
                    <a href="https://wa.me/919426514227?text=Quote%20Request%3A%20RR%20Kabel%20Armoured%20Cable" class="btn btn-outline-success btn-sm w-100 fw-bold mt-auto" target="_blank"><i class="bi bi-whatsapp me-1"></i> Get Price Quote</a>
                </div>
            </div>
        </div>

        <!-- Item 3: MCB Switchgear -->
        <div class="col-lg-4 col-md-6 brand-item" data-category="switchgear">
            <div class="card h-100 border-0 shadow-sm overflow-hidden">
                <div class="product-card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=500&q=80" class="product-card-img" alt="L&T Tripper MCB & RCCB">
                </div>
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-danger mb-2 w-auto align-self-start">Switchgear & MCB</span>
                    <h5 class="fw-bold text-dark">L&T Tripper MCB & RCCB</h5>
                    <p class="small text-muted">Overload & short-circuit protection devices.</p>
                    <ul class="list-unstyled small mb-3">
                        <li><i class="bi bi-check2 text-success me-1"></i>Single Pole (SP), DP, TP, TPN</li>
                        <li><i class="bi bi-check2 text-success me-1"></i>Rating: 6A to 63A (C-Curve)</li>
                    </ul>
                    <a href="https://wa.me/919426514227?text=Quote%20Request%3A%20L%26T%20MCB%20and%20RCCB" class="btn btn-outline-success btn-sm w-100 fw-bold mt-auto" target="_blank"><i class="bi bi-whatsapp me-1"></i> Inquire Stock</a>
                </div>
            </div>
        </div>

        <!-- Item 4: Modular Switches -->
        <div class="col-lg-4 col-md-6 brand-item" data-category="switchgear">
            <div class="card h-100 border-0 shadow-sm overflow-hidden">
                <div class="product-card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=500&q=80" class="product-card-img" alt="Havells Modular Switches">
                </div>
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-danger mb-2 w-auto align-self-start">Switchgear & MCB</span>
                    <h5 class="fw-bold text-dark">Havells Fabio Modular Switches</h5>
                    <p class="small text-muted">Polycarbonate flame-resistant switch plates and sockets.</p>
                    <ul class="list-unstyled small mb-3">
                        <li><i class="bi bi-check2 text-success me-1"></i>6A, 16A, 25A Power Outlets</li>
                        <li><i class="bi bi-check2 text-success me-1"></i>White & Charcoal Gloss Finishes</li>
                    </ul>
                    <a href="https://wa.me/919426514227?text=Quote%20Request%3A%20Havells%20Fabio%20Switches" class="btn btn-outline-success btn-sm w-100 fw-bold mt-auto" target="_blank"><i class="bi bi-whatsapp me-1"></i> Inquire Stock</a>
                </div>
            </div>
        </div>

        <!-- Item 5: LED Lighting -->
        <div class="col-lg-4 col-md-6 brand-item" data-category="lighting">
            <div class="card h-100 border-0 shadow-sm overflow-hidden">
                <div class="product-card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1507473885765-e6ed057f782c?auto=format&fit=crop&w=500&q=80" class="product-card-img" alt="Philips Concealed LED Downlights">
                </div>
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-warning text-dark mb-2 w-auto align-self-start">LED Lighting</span>
                    <h5 class="fw-bold text-dark">Philips Concealed LED Downlights</h5>
                    <p class="small text-muted">False ceiling recessed square and round LED panels.</p>
                    <ul class="list-unstyled small mb-3">
                        <li><i class="bi bi-check2 text-success me-1"></i>Wattage: 6W, 12W, 15W, 22W</li>
                        <li><i class="bi bi-check2 text-success me-1"></i>Warm White & Cool Daylight</li>
                    </ul>
                    <a href="https://wa.me/919426514227?text=Quote%20Request%3A%20Philips%20Concealed%20LED" class="btn btn-outline-success btn-sm w-100 fw-bold mt-auto" target="_blank"><i class="bi bi-whatsapp me-1"></i> Inquire Stock</a>
                </div>
            </div>
        </div>

        <!-- Item 6: Fans & Appliances -->
        <div class="col-lg-4 col-md-6 brand-item" data-category="fans">
            <div class="card h-100 border-0 shadow-sm overflow-hidden">
                <div class="product-card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=500&q=80" class="product-card-img" alt="Crompton High-Speed Ceiling Fans">
                </div>
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-info text-dark mb-2 w-auto align-self-start">Fans & Appliances</span>
                    <h5 class="fw-bold text-dark">Crompton High-Speed Ceiling Fans</h5>
                    <p class="small text-muted">Long-life double ball bearing motors with anti-dust coating.</p>
                    <ul class="list-unstyled small mb-3">
                        <li><i class="bi bi-check2 text-success me-1"></i>1200mm (48 inch) Sweep</li>
                        <li><i class="bi bi-check2 text-success me-1"></i>5-Star Energy Saver BLDC Models</li>
                    </ul>
                    <a href="https://wa.me/919426514227?text=Quote%20Request%3A%20Crompton%20Ceiling%20Fan" class="btn btn-outline-success btn-sm w-100 fw-bold mt-auto" target="_blank"><i class="bi bi-whatsapp me-1"></i> Get Price Quote</a>
                </div>
            </div>
        </div>

    </div>
</div>
 @endsection