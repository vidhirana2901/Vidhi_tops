<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Playlist Name</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-800 p-8 rounded-lg shadow-lg border border-gray-700 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-green-400">Edit Playlist Name</h1>

        <form action="{{ route('playlists.update', $playlist->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium mb-2 text-gray-300">Playlist Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $playlist->name) }}" required
                       class="w-full p-3 rounded bg-gray-700 border border-gray-600 text-white focus:outline-none focus:border-green-500">
                @error('name')
                    <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('playlists.index') }}" class="text-gray-400 hover:underline text-sm">Cancel</a>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-black font-bold px-5 py-2 rounded">
                    Update Name
                </button>
            </div>
        </form>
    </div>
</body>
</html>