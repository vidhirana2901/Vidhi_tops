<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    // 1. Show the Zomato-style form
    public function create()
    {
        return view('restaurants.create');
    }

    // 2. Handle POST submission and save to MySQL database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cuisine' => 'required|string|max:255',
        ]);

        Restaurant::create($validated);

        return redirect()->back()->with('success', 'Restaurant added successfully to Zomato listings!');
    }
}
?>