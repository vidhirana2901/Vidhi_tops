<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * Display a customer registration form.
     */
    public function create()
    {
        return view('website.register');
        return view('admin.view_customers');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:20',
            'gender' => 'required|string',
            'hobby' => 'required|array',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
       
        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->phone = $request->phone;
        $customer->gender = $request->gender;
        $customer->hobby = implode(', ', $request->hobby);
        // Handle image upload
        // img upload
		$image=$request->file('image');
		$filename=time().'_img.'.$request->file('image')->getClientOriginalExtension(); // 121545454_img.jpg
		$image->move('admin/assets/upload/images/customer',$filename); // upload file in public 
		
		$customer->image=$filename;
        $customer->save();
        Alert::success('Success', 'Registration successful. Please login to continue.');
        return redirect('/login');
    }

    /**
     * Display the login form.
     */
    public function login()
    {
        return view('website.login');
    }

    /**
     * Process customer login.
     */
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if (!empty($customer) && Hash::check($request->password, $customer->password)) {
            session()->put('id', $customer->id);
            session()->put('name', $customer->customer_name);
            return redirect('/')->with('success', 'Login successful.');
        }

        return redirect('/login')->with('message', 'Invalid email or password.');
    }

    /**
     * Logout the visitor.
     */
    public function logout(Request $request)
    {
        session()->pull('id');
        session()->pull('name');
        return redirect('/login');
    }

    /**
     * Show the logged-in customer's profile page.
     */
    public function user_profile(customer $customer)
    {
        $customer=customer::where('id',session('id'))->first(); // first get only 1 data in string
        return view('website.view_profile',compact('customer'));
    } 

    /**
     * Show the edit profile form for the logged-in customer.
     */
    public function editProfile()
    {
        if (! session('id')) {
            return redirect('/login')->with('error', 'Please login to edit your profile.');
        }
    
        $customer = Customer::findOrFail(session('id'));

        return view('website.edit_profile', compact('customer'));
    }

    /**
     * Update the logged-in customer's profile.
     */
    public function updateProfile(Request $request)
    {
        if (! session('id')) {
            return redirect('/login')->with('error', 'Please login to edit your profile.');
        }

        $customer = Customer::findOrFail(session('id'));

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:20',
            'gender' => 'nullable|string',
            'hobby' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $customer->customer_name = $validated['customer_name'];
        $customer->email = $validated['email'];
        $customer->phone = $validated['phone'];
        $customer->gender = $validated['gender'] ?? $customer->gender;
        $customer->hobby = $request->has('hobby') ? implode(', ', $request->hobby) : ($customer->hobby ?? '');

        if ($request->hasFile('image')) {
            $oldImage = $customer->image;
            if ($oldImage && file_exists(public_path('admin/assets/upload/images/customer/' . $oldImage))) {
                unlink(public_path('admin/assets/upload/images/customer/' . $oldImage));
            }

            $file = $request->file('image');
            $filename = time() . '_img.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/assets/upload/images/customer'), $filename);
            $customer->image = $filename;
        }

        $customer->save();
        session(['name' => $customer->customer_name]);

        return redirect('/user-profile')->with('success', 'Profile updated successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $customers = Customer::paginate(5);
        return view('admin.view_customers', compact('customers'));
    }

     public function show_api()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, $id)
    {
        $customer = Customer::find($id);
        $image=$customer->image;
        unlink(public_path('admin/assets/upload/images/customer/'.$image));
    
        $customer->delete();
        return redirect('/admin/view_customers')->with('success', 'Customer deleted successfully.');
    }

    /**
     * Toggle the status of a customer between 'Block' and 'Unblock'.
     */
    public function status_customer(customer $customer,$id)
    {
        $customer=customer::find($id);
		$status=$customer->status;
		if($status=="Block")
		{
			$customer->status="Unblock";
		}
		else
		{
			$customer->status="Block";
		}	
		
		$customer->update();
		return redirect()->back()->with('message', 'Updated Success');
    }
}