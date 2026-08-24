<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event - BookMyShow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-800 p-8 rounded-xl shadow-xl border border-gray-700 w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6 text-red-500">Host New Event</h1>

        <!-- Global Error Alert Box Above Form Fields -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-900/50 border border-red-500 text-red-200 rounded-lg">
                <p class="font-bold mb-2 text-sm">Please correct the following errors:</p>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-600 text-white rounded-lg text-sm font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <!-- Event Name -->
            <div class="mb-4">
                <label for="event_name" class="block text-sm font-medium mb-1 text-gray-300">Event Name *</label>
                @error('event_name')
                    <span class="text-red-400 text-xs mb-1 block font-semibold">{{ $message }}</span>
                @enderror
                <input type="text" name="event_name" id="event_name" value="{{ old('event_name') }}" placeholder="e.g., Arijit Singh Live Concert"
                       class="w-full p-3 rounded bg-gray-700 border {{ $errors->has('event_name') ? 'border-red-500' : 'border-gray-600' }} text-white focus:outline-none">
            </div>

            <!-- Date -->
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium mb-1 text-gray-300">Event Date *</label>
                @error('date')
                    <span class="text-red-400 text-xs mb-1 block font-semibold">{{ $message }}</span>
                @enderror
                <input type="date" name="date" id="date" value="{{ old('date') }}"
                       class="w-full p-3 rounded bg-gray-700 border {{ $errors->has('date') ? 'border-red-500' : 'border-gray-600' }} text-white focus:outline-none">
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium mb-1 text-gray-300">Location / Venue *</label>
                @error('location')
                    <span class="text-red-400 text-xs mb-1 block font-semibold">{{ $message }}</span>
                @enderror
                <input type="text" name="location" id="location" value="{{ old('location') }}" placeholder="e.g., Narendra Modi Stadium, Ahmedabad"
                       class="w-full p-3 rounded bg-gray-700 border {{ $errors->has('location') ? 'border-red-500' : 'border-gray-600' }} text-white focus:outline-none">
            </div>

            <!-- Description with 200 Character Limit Rule -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium mb-1 text-gray-300">Description (Max 200 characters)</label>
                @error('description')
                    <span class="text-red-400 text-xs mb-1 block font-semibold">{{ $message }}</span>
                @enderror
                <textarea name="description" id="description" rows="3" placeholder="Brief details about the event..."
                          class="w-full p-3 rounded bg-gray-700 border {{ $errors->has('description') ? 'border-red-500' : 'border-gray-600' }} text-white focus:outline-none">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-lg transition">
                Publish Event
            </button>
        </form>
    </div>
</body>
</html>