<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Picture</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-800 p-8 rounded-xl shadow-xl border border-gray-700 w-full max-w-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-400">Upload Profile Picture</h1>
            <a href="{{ route('profile.gallery') }}" class="text-xs bg-gray-700 hover:bg-gray-600 px-3 py-1.5 rounded text-gray-300">View Gallery</a>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-900/50 border border-red-500 text-red-200 rounded-lg text-xs space-y-1">
                @foreach ($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- User Select -->
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium mb-1 text-gray-300">Select User</label>
                <select name="user_id" id="user_id" class="w-full p-3 rounded bg-gray-700 border border-gray-600 text-white focus:outline-none">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} (ID: {{ $user->id }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Profile Picture File Input -->
            <div class="mb-6">
                <label for="profile_picture" class="block text-sm font-medium mb-1 text-gray-300">Profile Picture (JPG, PNG < 2MB)</label>
                <input type="file" name="profile_picture" id="profile_picture" accept="image/jpeg,image/png"
                       class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-500 file:text-black hover:file:bg-green-600 cursor-pointer bg-gray-700 border border-gray-600 rounded">
            </div>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-black font-bold py-3 rounded-lg transition">
                Upload & Save
            </button>
        </form>
    </div>
</body>
</html>