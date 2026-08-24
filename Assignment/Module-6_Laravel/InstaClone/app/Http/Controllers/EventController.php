<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display the form to create a new event.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(StoreEventRequest $request)
    {
        Event::create($request->validated());

        return redirect()->route('events.create')
            ->with('success', 'Event published successfully!');
    }
}
?>