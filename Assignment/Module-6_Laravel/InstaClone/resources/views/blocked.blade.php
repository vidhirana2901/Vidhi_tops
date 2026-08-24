<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Account blocked</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex min-h-screen items-center justify-center bg-gray-100 px-6 text-center text-gray-900">
        <main>
            <h1 class="text-3xl font-semibold">Account blocked</h1>
            <p class="mt-3 text-gray-600">Your account is currently inactive. Please contact support.</p>
        </main>
    </body>
</html>