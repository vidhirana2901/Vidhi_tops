@extends('website.layout.layout')

@section('container')

<div class="py-4 text-white" style="background: linear-gradient(90deg, #0B2545 0%, #06172E 100%);">
    <div class="container text-center">
        <h1 class="fw-bold mb-1">Customer Registration</h1>
        <p class="mb-0 text-light">Create your account to buy products, track orders, and access special offers.</p>
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

                <h3 class="fw-bold mb-4" style="color: var(--primary-blue);">Register as a Customer</h3>

                <form action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Full Name *</label>
                        <input type="text" class="form-control" name="customer_name" value="{{ old('customer_name') }}"  >
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email Address *</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"  >
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Password *</label>
                            <input type="password" class="form-control" name="password"  >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Confirm Password *</label>
                            <input type="password" class="form-control" name="password_confirmation"  >
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mobile Number *</label>
                        <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}"  >
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Gender *</label>
                        <input type="radio" name="gender" value="Male">Male
                        <input type="radio" name="gender" value ="Female">Female 
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Hobby *</label>
                        <fieldset>
                            Singing : <input type="checkbox" name="hobby[]" value="Singing"><br>
                            Dancing : <input type="checkbox" name="hobby[]" value="Dancing"><br>
                            Reading : <input type="checkbox" name="hobby[]" value="Reading"><br>
                            Sports : <input type="checkbox" name="hobby[]" value="Sports"> 
                        </fieldset>

                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Profile Picture *</label>
                        <input type="file" class="form-control" name="image"  >
                    </div>

                    <button type="submit" name="submit-customer"class="btn btn-orange w-100 fw-bold">Create Account</button>
                </form>

                <div class="text-center mt-4">
                    <p class="mb-0">Already have an account? <a href="{{ url('/login') }}">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
