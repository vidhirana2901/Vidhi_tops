<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Krishna Electricals</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Anti-Glare Style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background-color: #0B2545; /* Dark Navy Background */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 420px;
            padding: 2.5rem;
        }
        .login-title {
            color: #0B2545; /* Dark Navy Text */
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .login-subtitle {
            color: #6c757d; /* Medium Grey Subtitle */
            font-size: 0.85rem;
        }
        .form-label {
            color: #1e293b; /* Dark charcoal for labels */
            font-weight: 600;
            font-size: 0.875rem;
        }
        .btn-orange {
            background-color: #E06D14;
            border-color: #E06D14;
            color: #ffffff;
            font-weight: 600;
        }
        .btn-orange:hover {
            background-color: #c85e0f;
            border-color: #c85e0f;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <!-- Logo & Header -->
        <div class="text-center mb-4">
            <div class="bg-warning text-dark mx-auto mb-2 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                <i class="bi bi-lightning-charge-fill fs-4"></i>
            </div>
            <h4 class="login-title mb-0">KRISHNA ELECTRICALS</h4>
            <span class="login-subtitle">Admin Panel Authentication</span>
        </div>
        @if(session('message'))
				  <div class="alert alert-danger">
					  <strong>Failed!</strong> {{ session('message')}}
				  </div>
		@endif
        <!-- Login Form -->
        <form action="{{ route('admin.admin_auth') }}" method="POST">
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
                <label class="form-label">Username / Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light text-muted"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"   >
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light text-muted"><i class="bi bi-lock-fill"></i></span>
                    <input type="password"  name="password" value="{{ old('password') }}" class="form-control"   >
                </div>
            </div>

            <button type="submit" class="btn btn-orange w-100 py-2 shadow-sm">
                Sign In to Dashboard <i class="bi bi-arrow-right-short ms-1 fs-5"></i>
            </button>
        </form>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>