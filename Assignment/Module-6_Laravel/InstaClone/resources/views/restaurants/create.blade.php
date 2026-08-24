<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Restaurant - Zomato</title>
</head>
<body>

    <h2>Add New Restaurant</h2>

    <!-- Display Success Message -->
    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('restaurants.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Restaurant Name:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Punjab Grill" required>
            @error('name')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <br>

        <div>
            <label for="cuisine">Cuisine Type:</label><br>
            <input type="text" id="cuisine" name="cuisine" value="{{ old('cuisine') }}" placeholder="e.g. North Indian, Chinese, Italian" required>
            @error('cuisine')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <br>

        <button type="submit">Add Restaurant</button>
    </form>

</body>
</html>