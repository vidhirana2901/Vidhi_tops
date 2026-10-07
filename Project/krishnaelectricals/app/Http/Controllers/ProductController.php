<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
        ]);
        // Create a new product
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->stock_quantity = $request->stock_quantity;
        $product->save();

        return redirect('/admin/view_products')->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $products = Product::paginate(5);
        return view('admin.view_products', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $edit_product = Product::find($id);
        return view('admin.edit_product', compact('edit_product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product,$id)
    {
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->stock_quantity = $request->stock_quantity;
        $product->save();

        return redirect('/admin/view_products')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/view_products')->with('success', 'Product deleted successfully.');
    }
}
