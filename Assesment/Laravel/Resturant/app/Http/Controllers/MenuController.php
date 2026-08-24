<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::with('restaurant')->get()->groupBy('category');

        return view('menu.index', compact('menuItems'));
    }
}