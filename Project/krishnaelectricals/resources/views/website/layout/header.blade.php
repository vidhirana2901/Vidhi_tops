<?php
function active($current_page) {
    // Get current request path
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    
    // Check if path matches or defaults to home
    if ($current_page == $uri || ($current_page == 'index' && $uri == '')) {
        echo 'active';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishna Electricals | Maninagar, Ahmedabad</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo url('website/assets/css/style.css'); ?>">
</head>
<body>
    @include('sweetalert::alert')
    <!-- Top Utility Contacts Bar -->
    <div class="top-header-bar py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <i class="bi bi-telephone-fill me-1 text-warning"></i> +91 94265 14227
                <span class="ms-3 d-none d-md-inline"><i class="bi bi-envelope-fill me-1 text-warning"></i> contact@krishnaelectricals.in</span>
            </div>
            <div>
                <i class="bi bi-geo-alt-fill me-1 text-warning"></i> Shop-7 K.B. Complex, Maninagar, Ahmedabad
            </div>
        </div>
    </div>    

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light main-navbar sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?php echo url('/'); ?>">
                <img src="<?php echo url('website/assets/images/logo.png'); ?>" alt="Krishna Electricals Logo" class="navbar-brand-img">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#krishnaNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="krishnaNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link <?php active('index'); ?>" href="<?php echo url('/'); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?php active('about'); ?>" href="<?php echo url('/about'); ?>">About Us</a></li>
                    <li class="nav-item"><a class="nav-link <?php active('products'); ?>" href="<?php echo url('/products'); ?>">Products</a></li>
                    <li class="nav-item"><a class="nav-link <?php active('gallery'); ?>" href="<?php echo url('/gallery'); ?>">Services</a></li>
                    <li class="nav-item"><a class="nav-link <?php active('faq'); ?>" href="<?php echo url('/faq'); ?>">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link <?php active('feedback'); ?>" href="<?php echo url('/feedback'); ?>">Feedback</a></li>
                    <li class="nav-item"><a class="nav-link <?php active('contact'); ?>" href="<?php echo url('/contact'); ?>">Contact</a></li>
                </ul>
                @if(session('id'))
                    <div class="ms-lg-3 position-relative">
                        <button class="btn btn-get-quote d-inline-flex align-items-center" type="button" id="customerMenuToggle" onclick="toggleCustomerMenu()">
                            <i class="bi bi-person-circle me-2"></i>
                            <span>{{ session('name') }}</span>
                        </button>
                        <div id="customerMenuBox" class="shadow-sm border-0 py-2" style="display:none; position:absolute; right:0; top:110%; background:#fff; min-width:220px; border-radius:8px; z-index:1000;">
                            <a class="d-block px-3 py-2 text-decoration-none text-dark" href="{{ url('/user-profile') }}">
                                <i class="bi bi-person-lines-fill me-2 text-primary"></i> View Profile
                            </a>
                            <hr class="my-2">
                            <form action="{{ url('/logout') }}" method="POST" class="m-0 p-0">
                                @csrf
                                <button type="submit" class="d-block w-100 text-start px-3 py-2 border-0 bg-transparent text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ url('/register') }}" class="btn btn-get-quote ms-lg-3">Register</a>
                    <a href="{{ url('/login') }}" class="btn btn-get-quote ms-lg-3">Login</a>
                @endif
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleCustomerMenu() {
            var menu = document.getElementById('customerMenuBox');
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }

        document.addEventListener('click', function (event) {
            var menu = document.getElementById('customerMenuBox');
            var toggle = document.getElementById('customerMenuToggle');
            if (menu && toggle && !menu.contains(event.target) && !toggle.contains(event.target)) {
                menu.style.display = 'none';
            }
        });
    </script>