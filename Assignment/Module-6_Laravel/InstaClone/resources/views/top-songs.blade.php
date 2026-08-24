<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Trending Songs</title>
</head>
<body>
	<h1>Hello, {{ $userName }}! 👋</h1>
    <h1>Top Trending Songs</h1>

    <ul>
        @forelse($songs as $song)
            <li>{{ $song }}</li>
        @empty
            <li>No songs found in the playlist.</li>
        @endforelse
    </ul>
</body>
</html>