@extends('website.layout.layout')

@section('container')

<!-- Hero Section -->
<section class="hero-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="hero-title mb-3">
                    YOUR TRUSTED <span>ELECTRICAL SOLUTIONS</span> PARTNER IN MANINAGAR, AHMEDABAD
                </h1>
                <p class="lead mb-4 text-light">Since 1990. Providing Top-Quality Domestic, Commercial, and Industrial Electrical Supplies & Services.</p>
                <div>
                    <a href="products" class="btn btn-orange me-3 mb-2">BROWSE PRODUCTS</a>
                    <a href="gallery" class="btn btn-outline-custom mb-2">OUR SERVICES</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Category Cards Section (Matches Mockup 4 Grid Cards) -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            
            <!-- Wires & Cables -->
            <div class="col-lg-3 col-md-6">
                <div class="category-card h-100">
                    <div class="category-card-header">
                        <i class="bi bi-outlet fs-4"></i>
                        <span>Wires & Cables</span>
                    </div>
                    <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=400&q=80" class="category-card-img" alt="Wires & Cables">
                    <div class="p-3 text-center border-top">
                        <a href="products?cat=wires" class="fw-bold text-decoration-none text-dark">Wires & Cables &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Switchgear & MCB -->
            <div class="col-lg-3 col-md-6">
                <div class="category-card h-100">
                    <div class="category-card-header">
                        <i class="bi bi-cpu fs-4"></i>
                        <span>Switchgear & MCB</span>
                    </div>
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=400&q=80" class="category-card-img" alt="Switchgear & MCB">
                    <div class="p-3 text-center border-top">
                        <a href="products?cat=switchgear" class="fw-bold text-decoration-none text-dark">Switchgear & MCB &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- LED Lighting -->
            <div class="col-lg-3 col-md-6">
                <div class="category-card h-100">
                    <div class="category-card-header">
                        <i class="bi bi-lightbulb fs-4"></i>
                        <span>LED Lighting</span>
                    </div>
                    <img src="https://images.unsplash.com/photo-1507473885765-e6ed057f782c?auto=format&fit=crop&w=400&q=80" class="category-card-img" alt="LED Lighting">
                    <div class="p-3 text-center border-top">
                        <a href="products?cat=lighting" class="fw-bold text-decoration-none text-dark">LED Lighting &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Home Appliances -->
            <div class="col-lg-3 col-md-6">
                <div class="category-card h-100">
                    <div class="category-card-header">
                        <i class="bi bi-fan fs-4"></i>
                        <span>Home Appliances</span>
                    </div>
                    <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=400&q=80" class="category-card-img" alt="Fans & Geysers">
                    <div class="p-3 text-center border-top">
                        <a href="products?cat=fans" class="fw-bold text-decoration-none text-dark">Fans, Geysers & More &rarr;</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Authorized Brands Strip -->
<section class="py-5 bg-white border-top border-bottom">
    <div class="container">
        <h3 class="text-center fw-bold mb-4" style="color: var(--primary-blue);">Authorized Brands We Deal With</h3>
        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">
            <div class="col"><div class="brand-box shadow-sm">RR KÁBEL</div></div>
            <div class="col"><div class="brand-box shadow-sm">POLYCAB</div></div>
            <div class="col"><div class="brand-box shadow-sm">HAVELLS</div></div>
            <div class="col"><div class="brand-box shadow-sm">ANCHOR</div></div>
            <div class="col"><div class="brand-box shadow-sm">SYSKA</div></div>
            <div class="col"><div class="brand-box shadow-sm">LARSEN & TOUBRO</div></div>
            <div class="col"><div class="brand-box shadow-sm">HPL</div></div>
            <div class="col"><div class="brand-box shadow-sm">CROMPTON</div></div>
            <div class="col"><div class="brand-box shadow-sm">BAJAJ</div></div>
            <div class="col"><div class="brand-box shadow-sm">GELCO</div></div>
            <div class="col"><div class="brand-box shadow-sm">PHILIPS</div></div>
            <div class="col"><div class="brand-box shadow-sm">HI-FI</div></div>
        </div>
    </div>
</section>

<!-- Key Services Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h3 class="text-center fw-bold mb-4" style="color: var(--primary-blue);">Key Services</h3>
        <div class="row g-4">
            <div class="col-md-3 text-center">
                <div class="p-3 bg-white rounded shadow-sm border h-100">
                    <i class="bi bi-tools display-5 text-primary mb-2"></i>
                    <h5 class="fw-bold">Electrical Installations</h5>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="p-3 bg-white rounded shadow-sm border h-100">
                    <i class="bi bi-box-seam display-5 text-primary mb-2"></i>
                    <h5 class="fw-bold">Panel Manufacturing</h5>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="p-3 bg-white rounded shadow-sm border h-100">
                    <i class="bi bi-shield-check display-5 text-primary mb-2"></i>
                    <h5 class="fw-bold">Earthing Systems</h5>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="p-3 bg-white rounded shadow-sm border h-100">
                    <i class="bi bi-file-earmark-text display-5 text-primary mb-2"></i>
                    <h5 class="fw-bold">AMC Contracts</h5>
                </div>
            </div>
        </div>
    </div>
</section>

 @endsection