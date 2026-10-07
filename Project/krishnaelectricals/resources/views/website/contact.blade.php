@extends('website.layout.layout')

@section('container')

<div class="py-4 text-white" style="background: linear-gradient(90deg, #0B2545 0%, #06172E 100%);">
    <div class="container text-center">
        <h1 class="fw-bold mb-1">Contact & Visit Our Store</h1>
        <p class="mb-0 text-light">Submit your material requirement list or visit our shop in Rambag, Maninagar.</p>
    </div>
</div>

<div class="container py-4">
    <div class="row g-4">
        <!-- Form -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm p-4 bg-white">
                <h3 class="fw-bold mb-3" style="color: var(--primary-blue);">Request Material Quote</h3>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Added missing form opening tag below -->
                <form action="{{ route('submit-inquiry') }}" method="POST" id="contactForm">
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

                    <div class="mb-3">
                        <label class="form-label fw-bold">Full Name *</label>
                        <input type="text" class="form-control" name="client_name" id="fullName" value="{{ old('client_name') }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Phone Number *</label>
                            <input type="tel" class="form-control" name="contact" id="phone" value="{{ old('contact') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Inquiry Type</label>
                            <select class="form-select" name="status">
                                <option value="Bulk Contractor Quote">Bulk Contractor Quote</option>
                                <option value="Retail Purchase Inquiry">Retail Purchase Inquiry</option>
                                <option value="Stock Availability">Stock Availability</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Requirement List / Message *</label>
                        <textarea class="form-control" name="requirements" id="message" rows="4" placeholder="Mention wire sizes, breaker ratings, light quantities, or brand preferences..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-orange w-100 fw-bold">Send Quote Request</button>
                </form>
            </div>
        </div>

        <!-- Store Map & Contacts -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm p-4 bg-white h-100">
                <h3 class="fw-bold mb-3" style="color: var(--primary-blue);">Store Contact Information</h3>
                <p class="mb-2"><strong>Krishna Electricals</strong></p>
                <p class="text-muted mb-2"><i class="bi bi-person-fill text-warning me-2"></i><strong>Proprietor:</strong> Shripur Rana (Lalabhai)</p>
                <p class="text-muted mb-2"><i class="bi bi-telephone-fill text-warning me-2"></i><strong>Phone:</strong> +91 94265 14227</p>
                <p class="text-muted mb-3"><i class="bi bi-geo-alt-fill text-warning me-2"></i><strong>Address:</strong> Shop-7 K.B. Complex, Opp. Ramkrishna Seva Samity, Nr. Sardar Patel Hospital, Rambag, Maninagar, Ahmedabad - 380008</p>
                
                <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm mt-auto">
                    <iframe src="https://maps.google.com/maps?q=Rambag,%20Maninagar,%20Ahmedabad&t=&z=15&ie=UTF8&iwloc=&output=embed" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection