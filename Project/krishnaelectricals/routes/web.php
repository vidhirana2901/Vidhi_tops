<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AdminController;


use App\Models\Customer;
use Illuminate\Support\Facades\Route;

/*
| Public Website Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('website.index');
});

Route::get('/index', function () {
    return view('website.index');
});

Route::get('/about', function () {
    return view('website.about');
});

Route::get('/products', function () {
    return view('website.products');
});

Route::get('/contact', [InquiryController::class, 'create'])->name('contact');
Route::post('/submit-inquiry', [InquiryController::class, 'store'])->name('submit-inquiry');

Route::get('/faq', function () {
    return view('website.faq');
});

Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback');
Route::post('/submit-feedback', [FeedbackController::class, 'store'])->name('submit-feedback');


Route::get('/gallery', function () {
    return view('website.gallery');
});

Route::get('/register', [CustomerController::class, 'create'])->middleware('web_before');
Route::post('/register', [CustomerController::class, 'store'])->middleware('web_before');

Route::get('/login', [CustomerController::class, 'login'])->middleware('web_before');
Route::post('/submit-auth', [CustomerController::class, 'auth'])->middleware('web_before');

Route::post('/logout', [CustomerController::class, 'logout'])->middleware('web_after');
Route::get('/user-profile', [CustomerController::class, 'user_profile'])->name('customer.profile')->middleware('web_after');
Route::get('/customer/profile/edit', [CustomerController::class, 'editProfile'])->name('customer.profile.edit')->middleware('web_after');
Route::post('/customer/profile/update', [CustomerController::class, 'updateProfile'])->name('customer.profile.update')->middleware('web_after');

/*
|--------------------------------------------------------------------------
| Admin Control Panel Routes (Prefix: /admin)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

Route::group(['middleware'=>['admin_before']],function(){
        Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
        Route::post('/admin_auth', [AdminController::class, 'admin_auth'])->name('admin.admin_auth');
});

Route::group(['middleware'=>['admin_after']],function(){

    Route::post('/admin_logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');

    // Admin Dashboard: http://127.0.0.1:8000/admin/dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // Categories
    Route::get('/view_categories', [CategoryController::class, 'show']);
    Route::get('/add_category', [CategoryController::class, 'create']);
    Route::post('/submit-category', [CategoryController::class, 'store']);
    Route::get('/edit_category/{id}', [CategoryController::class, 'edit']);
    Route::post('/update_category/{id}', [CategoryController::class, 'update']);
    Route::get('/delete_category/{id}', [CategoryController::class, 'destroy']);


    // Products
    Route::get('/view_products', [ProductController::class, 'show']);
    Route::get('/add_product', [ProductController::class, 'create']);
    Route::post('/submit-product', [ProductController::class, 'store']);
    Route::get('/edit_product/{id}', [ProductController::class, 'edit']);
    Route::post('/update_product/{id}', [ProductController::class, 'update']);
    Route::get('/delete_product/{id}', [ProductController::class, 'destroy']);


    // Customers
    Route::get('/view_customers', [CustomerController::class, 'show']);
    //(Delete)Route::get('/add_customer', [CustomerController::class, 'create']);
    //(Delete) Route::post('/submit-customer', [CustomerController::class, 'store']);
    //(Delete) Route::get('/edit_customer/{id}', [CustomerController::class, 'edit']);
    //(Delete) Route::post('/update-customer/{id}', [CustomerController::class, 'update']);
    Route::get('/delete_customer/{id}', [CustomerController::class, 'destroy']);
    Route::get('/status_customer/{id}', [CustomerController::class, 'status_customer']);


    // Suppliers
    Route::get('/view_suppliers', [SupplierController::class, 'show']);
    Route::get('/add_supplier', [SupplierController::class, 'create']);
    Route::post('/submit-supplier', [SupplierController::class, 'store']);
    Route::get('/edit_supplier/{id}', [SupplierController::class, 'edit']);
    Route::post('/update-supplier/{id}', [SupplierController::class, 'update']);
    Route::get('/delete_supplier/{id}', [SupplierController::class, 'destroy']);

    // Inquiries
    Route::get('/view-inquiries', [InquiryController::class, 'show']);

    // Admin Feedback View: http://127.0.0.1:8000/admin/feedback
    Route::get('/view-feedback', [FeedbackController::class, 'show']);
});
});