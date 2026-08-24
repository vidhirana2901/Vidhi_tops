<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist</title>
</head>
<body>
	
	@include('partials.navbar') 
    <h2>My Playlist</h2>

    <ul>
        @foreach($songs as $song)
            <li>{{ $song }}</li>
        @endforeach
    </ul>

</body>
</html>