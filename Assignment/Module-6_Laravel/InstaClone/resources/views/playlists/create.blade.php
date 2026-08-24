<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Playlist</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-800 p-8 rounded-xl shadow-xl border border-gray-700 w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6 text-green-400">Create New Playlist</h1>

        <form action="{{ route('playlists.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Playlist Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium mb-2 text-gray-300">Playlist Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="e.g., Chill Beats"
                       class="w-full p-3 rounded bg-gray-700 border border-gray-600 text-white focus:outline-none focus:border-green-500">
                @error('name')
                    <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium mb-2 text-gray-300">Description</label>
                <textarea name="description" id="description" rows="3" placeholder="Give your playlist a short description..."
                          class="w-full p-3 rounded bg-gray-700 border border-gray-600 text-white focus:outline-none focus:border-green-500">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Cover Image Upload -->
            <div class="mb-6">
                <label for="cover_image" class="block text-sm font-medium mb-2 text-gray-300">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image" accept="image/*"
                       class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-500 file:text-black hover:file:bg-green-600 cursor-pointer bg-gray-700 border border-gray-600 rounded">
                <p class="text-xs text-gray-500 mt-1">Accepted types: JPG, PNG, WEBP (Max: 2MB)</p>
                @error('cover_image')
                    <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-between">
                <a href="{{ route('playlists.index') }}" class="text-gray-400 hover:underline text-sm">Cancel</a>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-black font-bold px-6 py-2.5 rounded-lg transition">
                    Create Playlist
                </button>
            </div>
        </form>
    </div>
</body>
</html>