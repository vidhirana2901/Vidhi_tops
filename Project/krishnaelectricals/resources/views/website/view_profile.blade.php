@extends('website.layout.layout')

@section('container')

<div class="py-4 text-white" style="background: linear-gradient(90deg, #0B2545 0%, #06172E 100%);">
    <div class="container text-center">
        <h1 class="fw-bold mb-1">My Profile</h1>
        <p class="mb-0 text-light">Here you can review your account details and update them anytime.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        @if($customer->image)
                            <img src="{{ url('admin/assets/upload/images/customer/' . $customer->image) }}" alt="Profile" class="img-fluid rounded-circle shadow" style="width: 160px; height: 160px; object-fit: cover;">
                        @else
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 160px; height: 160px; margin: 0 auto;">
                                <i class="bi bi-person-fill" style="font-size: 64px;"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h3 class="fw-bold mb-3" style="color: var(--primary-blue);">{{ $customer->customer_name }}</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Email:</strong> {{ $customer->email }}</li>
                            <li class="list-group-item"><strong>Phone:</strong> {{ $customer->phone }}</li>
                            <li class="list-group-item"><strong>Gender:</strong> {{ $customer->gender ?? 'Not provided' }}</li>
                            <li class="list-group-item"><strong>Hobbies:</strong> {{ $customer->hobby ?? 'Not provided' }}</li>
                        </ul>
                        <a href="{{ route('customer.profile.edit') }}" class="btn btn-orange mt-3">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
