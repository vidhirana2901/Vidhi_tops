@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-7 col-lg-5">
                <div class="content-card p-4 p-md-5 shadow-sm">
                    <p class="text-uppercase text-secondary small fw-semibold mb-2">Table&amp;Thyme</p>
                    <h1 class="h2 mb-4">Welcome back</h1>
                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="email">Email address</label>
                            <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" required>
                            @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" id="password" name="password" type="password">
                        </div>
                        <button class="btn btn-coral w-100" type="submit">Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection