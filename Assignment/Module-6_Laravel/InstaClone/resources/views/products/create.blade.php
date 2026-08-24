<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center p-6">
    <main class="bg-gray-800 p-8 rounded-xl shadow-xl border border-gray-700 w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6 text-green-400">Add New Product</h1>

        @if (session('success'))
            <p class="mb-4 text-green-400" role="status">{{ session('success') }}</p>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <label for="name" class="block text-sm font-medium mb-2 text-gray-300">Product name</label>
            <input id="name" name="name" value="{{ old('name') }}" required class="w-full p-3 mb-4 rounded bg-gray-700 border border-gray-600 text-white">
            @error('name')<p class="mb-4 text-red-400 text-sm">{{ $message }}</p>@enderror

            <label for="price" class="block text-sm font-medium mb-2 text-gray-300">Price</label>
            <input id="price" name="price" type="number" step="0.01" min="0" value="{{ old('price') }}" required class="w-full p-3 mb-4 rounded bg-gray-700 border border-gray-600 text-white">
            @error('price')<p class="mb-4 text-red-400 text-sm">{{ $message }}</p>@enderror

            <label for="description" class="block text-sm font-medium mb-2 text-gray-300">Description</label>
            <textarea id="description" name="description" rows="4" class="w-full p-3 mb-6 rounded bg-gray-700 border border-gray-600 text-white">{{ old('description') }}</textarea>
            @error('description')<p class="mb-4 text-red-400 text-sm">{{ $message }}</p>@enderror

            <button type="submit" class="bg-green-500 hover:bg-green-600 text-black font-bold px-6 py-2.5 rounded-lg">Add Product</button>
        </form>
    </main>
</body>
</html>
