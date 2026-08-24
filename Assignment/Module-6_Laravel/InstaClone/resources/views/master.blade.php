<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipkart Deals</title>
</head>
<body>

    <header>
        <h1>Flipkart Deals Store</h1>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>&copy; {{ date('Y') }} Flipkart Deals. All rights reserved.</p>
    </footer>

</body>
</html>