<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Playlist Summary</title>
</head>
<body>
    <main>
        <h1>Generate a Playlist Summary</h1>

        @if (isset($error))
            <p role="alert">{{ $error }}</p>
        @endif

        @if ($errors->any())
            <ul role="alert">
                @foreach ($errors->all() as $validationError)
                    <li>{{ $validationError }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('playlist.summary.generate') }}">
            @csrf
            <label for="playlist_description">Playlist description</label>
            <textarea
                id="playlist_description"
                name="playlist_description"
                rows="5"
                required
            >{{ old('playlist_description', $playlistDescription ?? '') }}</textarea>
            <button type="submit">Generate summary</button>
        </form>

        @if (isset($summary))
            <section aria-labelledby="summary-heading">
                <h2 id="summary-heading">AI-generated summary</h2>
                <p>{{ $summary }}</p>
            </section>
        @endif
    </main>
</body>
</html>