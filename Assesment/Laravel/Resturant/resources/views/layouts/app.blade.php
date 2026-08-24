<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        :root { --restaurant-ink: #17212b; --restaurant-coral: #e85d4a; --restaurant-cream: #fff9f2; --restaurant-sage: #557c70; }
        body { background: var(--restaurant-cream); color: var(--restaurant-ink); font-family: Georgia, 'Times New Roman', serif; }
        .site-nav { background: var(--restaurant-ink); }
        .brand-mark { color: #fff; letter-spacing: .04em; }
        .brand-mark span { color: #f5a26d; }
        .hero-panel { background: linear-gradient(120deg, #203a43, #557c70); color: #fff; border-radius: 1rem; }
        .menu-table { --bs-table-bg: transparent; vertical-align: middle; }
        .menu-table thead th { color: var(--restaurant-sage); font-family: system-ui, sans-serif; font-size: .76rem; letter-spacing: .12em; text-transform: uppercase; }
        .menu-table tbody tr { border-bottom: 1px solid #eadfd3; }
        .category-pill { background: #e6f0eb; color: #356156; font-family: system-ui, sans-serif; font-size: .78rem; }
        .price { color: var(--restaurant-coral); font-weight: 700; }
        .btn-coral { background: var(--restaurant-coral); border-color: var(--restaurant-coral); color: #fff; }
        .btn-coral:hover, .btn-coral:focus { background: #c94b3b; border-color: #c94b3b; color: #fff; }
        .content-card { background: #fff; border: 1px solid #eee3d7; border-radius: .75rem; }
    </style>
</head>
<body class="min-vh-100">
    <nav class="navbar navbar-expand-lg site-nav py-3">
        <div class="container">
            <a class="navbar-brand brand-mark fw-bold" href="{{ url('/') }}">Table<span>&amp;</span>Thyme</a>
            <button class="navbar-toggler border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#siteNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="siteNav">
                <div class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                    <a class="nav-link text-white" href="{{ route('menu.index') }}">Menu</a>
                    <a class="nav-link text-white" href="{{ route('orders.index') }}">Orders</a>
                    @auth @if (auth()->user()->role === 'admin')<a class="nav-link text-white" href="{{ route('admin.index') }}">Admin</a>@endif @endauth
                    <a class="btn btn-coral btn-sm px-3" href="{{ route('orders.create') }}">Place an order</a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="container py-5 text-center text-secondary small">Made for good food and better company.</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>