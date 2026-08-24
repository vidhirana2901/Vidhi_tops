<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen p-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8 border-b border-gray-700 pb-4">
            <h1 class="text-3xl font-bold">Profile Picture Gallery</h1>
            <a href="{{ route('profile.upload') }}" class="bg-green-500 hover:bg-green-600 text-black font-bold px-4 py-2 rounded-lg text-sm">
                + Upload New
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-600 text-white rounded-lg font-semibold text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($usersWithPics->isEmpty())
            <p class="text-gray-400">No profile pictures uploaded yet.</p>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($usersWithPics as $user)
                    <div class="bg-gray-800 border border-gray-700 rounded-xl overflow-hidden shadow-lg text-center p-4">
                        <img src="{{ asset($user->profile_picture) }}" alt="{{ $user->name }}" class="w-32 h-32 rounded-full object-cover mx-auto mb-3 border-2 border-green-400">
                        <h2 class="font-bold text-white text-base truncate">{{ $user->name }}</h2>
                        <p class="text-xs text-gray-400 mt-1">ID: {{ $user->id }}</p>
                        <p class="text-[10px] text-gray-500 mt-1 truncate">{{ basename($user->profile_picture) }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>