@extends('website.layout.layout')

@section('container')

<div class="py-4 text-white" style="background: linear-gradient(90deg, #0B2545 0%, #06172E 100%);">
    <div class="container text-center">
        <h1 class="fw-bold mb-1">Customer Login</h1>
        <p class="mb-0 text-light">Sign in to manage your order history and preferred products.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('message'))
				  <div class="alert alert-danger">
					  <strong>Failed!</strong> {{ session('message')}}
				  </div>
				 @endif

                <h3 class="fw-bold mb-4" style="color: var(--primary-blue);">Login to Your Account</h3>

                <form action="{{ url('/submit-auth') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email Address *</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Password *</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" >
                    </div>

                    <button type="submit" class="btn btn-orange w-100 fw-bold">Login</button>
                </form>

                <div class="text-center mt-4">
                    <p class="mb-0">Don&rsquo;t have an account? <a href="{{ url('/register') }}">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
