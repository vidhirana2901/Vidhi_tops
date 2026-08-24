<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
	@include('partials.navbar')
    @if (session('status'))
        <p role="status">{{ session('status') }}</p>
    @endif
    <h2>{{ $name }}</h2>
	<a href="{{ route('today.offers') }}">Today's Offers</a>
</body>
</html>