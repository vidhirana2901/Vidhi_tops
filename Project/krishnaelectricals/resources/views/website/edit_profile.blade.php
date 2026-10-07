@extends('website.layout.layout')

@section('container')

<div class="py-4 text-white" style="background: linear-gradient(90deg, #0B2545 0%, #06172E 100%);">
    <div class="container text-center">
        <h1 class="fw-bold mb-1">Edit Customer Profile</h1>
        <p class="mb-0 text-light">Update your personal details and profile photo below.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h3 class="fw-bold mb-4" style="color: var(--primary-blue);">My Profile</h3>

                <form action="{{ url('customer/profile/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Full Name *</label>
                        <input type="text" class="form-control" name="customer_name" value="{{ old('customer_name', $customer->customer_name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email Address *</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $customer->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mobile Number *</label>
                        <input type="tel" class="form-control" name="phone" value="{{ old('phone', $customer->phone) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Gender *</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Male" {{ old('gender', $customer->gender) == 'Male' ? 'checked' : '' }}>
                            <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Female" {{ old('gender', $customer->gender) == 'Female' ? 'checked' : '' }}>
                            <label class="form-check-label">Female</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Hobbies</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobby[]" value="Singing" {{ in_array('Singing', explode(', ', $customer->hobby)) ? 'checked' : '' }}>
                            <label class="form-check-label">Singing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobby[]" value="Dancing" {{ in_array('Dancing', explode(', ', $customer->hobby)) ? 'checked' : '' }}>
                            <label class="form-check-label">Dancing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobby[]" value="Reading" {{ in_array('Reading', explode(', ', $customer->hobby)) ? 'checked' : '' }}>
                            <label class="form-check-label">Reading</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobby[]" value="Sports" {{ in_array('Sports', explode(', ', $customer->hobby)) ? 'checked' : '' }}>
                            <label class="form-check-label">Sports</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Profile Picture</label>
                        <input type="file" class="form-control" name="image">
                        @if($customer->image)
                            <img src="{{ url('admin/assets/upload/images/customer/' . $customer->image) }}" alt="Profile" class="img-thumbnail mt-3" style="max-height: 120px;">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-orange w-100 fw-bold">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
