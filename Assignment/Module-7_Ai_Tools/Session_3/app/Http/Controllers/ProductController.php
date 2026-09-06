<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Return all products so the storefront or admin panel can display the catalogue.
    public function index(): JsonResponse
    {
        $products = DB::table('products')
            ->orderByDesc('created_at')
            ->get();

        return response()->json($products);
    }

    // Validate and save a new product submitted by a seller or administrator.
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'category' => ['required', 'string', 'max:100'],
        ]);

        $productId = DB::table('products')->insertGetId([
            ...$validated,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $product = DB::table('products')->find($productId);

        return response()->json($product, 201);
    }

    // Find one product by ID so its details can be shown on the product page.
    public function show(int $id): JsonResponse
    {
        $product = DB::table('products')->find($id);

        if ($product === null) {
            return response()->json([
                'message' => 'Product not found.',
            ], 404);
        }

        return response()->json($product);
    }

    // Validate and apply the edited product details to an existing catalogue item.
    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['sometimes', 'nullable', 'string'],
            'price' => ['sometimes', 'required', 'numeric', 'min:0'],
            'stock' => ['sometimes', 'required', 'integer', 'min:0'],
            'category' => ['sometimes', 'required', 'string', 'max:100'],
        ]);

        $updated = DB::table('products')
            ->where('id', $id)
            ->update([
                ...$validated,
                'updated_at' => now(),
            ]);

        if ($updated === 0 && DB::table('products')->where('id', $id)->doesntExist()) {
            return response()->json([
                'message' => 'Product not found.',
            ], 404);
        }

        return response()->json(DB::table('products')->find($id));
    }

    // Remove a product from the catalogue after confirming that it exists.
    public function destroy(int $id): JsonResponse
    {
        $deleted = DB::table('products')
            ->where('id', $id)
            ->delete();

        if ($deleted === 0) {
            return response()->json([
                'message' => 'Product not found.',
            ], 404);
        }

        return response()->json([
            'message' => 'Product deleted successfully.',
        ]);
    }
}
