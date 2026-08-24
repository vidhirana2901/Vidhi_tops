<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index', [
            'restaurants' => Restaurant::with('menuItems')->orderBy('name')->get(),
            'menuItems' => MenuItem::with('restaurant')->latest()->get(),
        ]);
    }

    public function storeRestaurant(Request $request): RedirectResponse
    {
        Restaurant::create($request->validate(['name' => ['required', 'string', 'max:255']]));

        return back()->with('status', 'Restaurant created.');
    }

    public function storeMenuItem(Request $request): RedirectResponse
    {
        MenuItem::create($request->validate([
            'restaurant_id' => ['required', 'exists:restaurants,id'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'is_available' => ['sometimes', 'boolean'],
        ]));

        return back()->with('status', 'Menu item created.');
    }

    public function updateMenuItem(Request $request, MenuItem $menuItem): RedirectResponse
    {
        $menuItem->update($request->validate([
            'restaurant_id' => ['required', 'exists:restaurants,id'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'is_available' => ['sometimes', 'boolean'],
        ]));

        return back()->with('status', 'Menu item updated.');
    }

    public function destroyMenuItem(MenuItem $menuItem): RedirectResponse
    {
        $menuItem->delete();

        return back()->with('status', 'Menu item deleted.');
    }
}
