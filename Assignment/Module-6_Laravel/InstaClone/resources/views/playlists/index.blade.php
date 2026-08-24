<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Playlists</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen p-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-3">
            <h1 class="text-3xl font-bold">Your Playlists</h1>
            <a href="{{ route('playlists.create') }}" class="bg-green-500 hover:bg-green-600 text-black font-semibold px-4 py-2 rounded-lg text-sm">
                + Create Playlist
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-600 text-white rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($playlists->isEmpty())
            <p class="text-gray-400">No playlists available yet.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($playlists as $playlist)
                    <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg border border-gray-700 flex flex-col">
                        @if($playlist->cover_image)
                            <img src="{{ $playlist->cover_image }}" alt="{{ $playlist->name }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-700 flex items-center justify-center text-gray-400">
                                No Cover
                            </div>
                        @endif

                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-green-400 mb-2">{{ $playlist->name }}</h2>
                                <p class="text-gray-300 text-sm mb-4">
                                    {{ $playlist->description ?? 'No description provided.' }}
                                </p>
                            </div>
                            
                            <!-- UPDATED: Footer section with timestamp and Edit button -->
                            <div class="flex items-center justify-between pt-3 border-t border-gray-700 mt-auto">
                                <span class="text-xs text-gray-500">
                                    Added {{ $playlist->created_at->diffForHumans() }}
                                </span>
                                <a href="{{ route('playlists.edit', $playlist->id) }}" class="text-xs bg-gray-700 hover:bg-gray-600 text-green-400 px-3 py-1 rounded border border-gray-600 font-semibold">
                                    Edit
                                </a>
								<!-- Delete Form -->
								<form action="{{ route('playlists.destroy', $playlist->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this playlist?');">
									@csrf
									@method('DELETE')
									<button type="submit" class="text-xs bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded font-semibold">
										Delete
									</button>
								</form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>