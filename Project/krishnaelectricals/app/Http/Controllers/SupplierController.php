<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
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
        return view('admin.add_supplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'gstin' => 'required|string|max:15',
        ]);

        // Create a new supplier
        $supplier = new Supplier();
        $supplier->supplier_name = $request->supplier_name;
        $supplier->contact_person = $request->contact_person;
        $supplier->phone = $request->phone;
        $supplier->gstin = $request->gstin;
        $supplier->save();

        return redirect('/admin/view_suppliers')->with('success', 'Supplier added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        $suppliers = Supplier::paginate(5);
        return view('admin.view_suppliers', compact('suppliers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier,$id)
    {
        $supplier = Supplier::find($id);
        return view('admin.edit_supplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier,$id)
    {
        $supplier = Supplier::find($id);
        $supplier->supplier_name = $request->supplier_name;
        $supplier->contact_person = $request->contact_person;
        $supplier->phone = $request->phone;
        $supplier->gstin = $request->gstin;
        $supplier->save();

        return redirect('/admin/view_suppliers')->with('success', 'Supplier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
