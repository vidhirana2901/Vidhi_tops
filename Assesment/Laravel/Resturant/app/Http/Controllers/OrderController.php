<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index', ['orders' => auth()->user()->orders()->with(['restaurant', 'orderItems.menuItem'])->latest()->get()]);
    }

    public function create()
    {
        return view('orders.create', ['restaurants' => \App\Models\Restaurant::orderBy('name')->get()]);
    }

    public function show($id)
    {
        return view('orders.show', ['order' => auth()->user()->orders()->with(['restaurant', 'orderItems.menuItem'])->findOrFail($id)]);
    }

    public function store(PlaceOrderRequest $request)
    {
        $order = Order::create([
            ...$request->validated(),
            'user_id' => auth()->id(),
        ]);

        $order->update(['status' => 'confirmed']);
        Mail::to($request->user())->queue(new OrderConfirmationMail($order));

        return redirect()->route('orders.show', $order->id)
            ->with('status', 'Order placed successfully.');
    }
}