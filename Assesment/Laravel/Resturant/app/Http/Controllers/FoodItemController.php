<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(MenuItem::with('restaurant')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'restaurant_id' => ['required', 'exists:restaurants,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['required', 'string', 'max:255'],
            'is_available' => ['sometimes', 'boolean'],
        ]);

        return response()->json(MenuItem::create($validated), 201);
    }

    public function show(MenuItem $foodItem): JsonResponse
    {
        return response()->json($foodItem);
    }

    public function update(Request $request, MenuItem $foodItem): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'restaurant_id' => ['sometimes', 'required', 'exists:restaurants,id'],
            'price' => ['sometimes', 'required', 'numeric', 'min:0'],
            'category' => ['sometimes', 'required', 'string', 'max:255'],
            'is_available' => ['sometimes', 'boolean'],
        ]);

        $foodItem->update($validated);

        return response()->json($foodItem->fresh());
    }

    public function destroy(MenuItem $foodItem): JsonResponse
    {
        $foodItem->delete();

        return response()->json(['message' => 'Food item deleted successfully.']);
    }
}