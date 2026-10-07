<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
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
        return view('website.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Inquiry();
       
        $request->validate([
            'client_name'  => 'required|string|max:255',
            'contact'      => 'required|string|max:20',
            'requirements' => 'required|string',
        ]);
        
        $data->client_name = $request->client_name;
        $data->contact = $request->contact;
        $data->requirements = $request->requirements;
        $data->status = $request->status ?? 'Pending Quote';

        $data->save();

        return redirect()->back()->with('success', 'Inquiry submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inquiry $inquiry)
    {
        $inquiries = Inquiry::paginate(5);
        return view('admin.view_inquiries', compact('inquiries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inquiry $inquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inquiry $inquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inquiry $inquiry)
    {
        //
    }
}
