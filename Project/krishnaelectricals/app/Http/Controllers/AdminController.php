<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function login()
    {
        return view('admin.admin_login');
    }

    public function admin_auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!empty($admin) ) {
            session()->put('aid', $admin->id);
            session()->put('aname', $admin->name);
            return redirect('/admin/dashboard');
        }

        return redirect()->back()->with('message', 'Invalid admin credentials.');
    }

    public function admin_logout()
    {
        session()->pull('aid');
        session()->pull('aname');
        return redirect('/admin/login');
    }

    public function profile()
    {
        $admin = Admin::where('id', session('aid'))->first();
        return view('admin.profile', compact('admin'));
    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
