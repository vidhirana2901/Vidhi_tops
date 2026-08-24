/*
|--------------------------------------------------------------------------
| Performance Optimization & Caching Notes
|--------------------------------------------------------------------------
|
| 1. php artisan config:cache
|    Combines all configuration files (app, database, auth, etc.) and .env
|    variables into a single cached PHP array in 'bootstrap/cache/config.php'.
|    This speeds up application bootstrapping by eliminating filesystem reads 
|    for dozens of config files on every HTTP request.
|
| 2. php artisan route:cache
|    Compiles all registered routes (web, api, auth) into a single optimized 
|    method call array in 'bootstrap/cache/routes-v7.php'. This drastically 
|    improves request routing performance by turning thousands of regex route 
|    evaluations into a single fast array lookup.
|
| IMPORTANT: Running these commands is crucial for production deployments, but 
| route closures (unnamed functions) must be avoided or converted to controller 
| actions for route:cache to succeed without errors.
|
*/
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', ['name' => 'InstaClone']);
})->name('home');

Route::get('/offers/today', function () {
    return view('offer', ['discount' => 25]);
})->name('today.offers');

Route::view('/deals', 'deals')->name('deals');

Route::view('/blocked', 'blocked')->name('blocked');

Route::get('/top-songs', function () {
    return view('top-songs', [
        'userName' => auth()->user()?->name ?? 'Guest',
        'songs' => [],
    ]);
})->name('top-songs');

Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');

Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');
Route::post('/restaurants', [RestaurantController::class, 'store'])->name('restaurants.store');

Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
Route::get('/playlists/latest', [PlaylistController::class, 'latest'])->name('playlists.latest');
Route::get('/playlists/{id}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
Route::put('/playlists/{id}', [PlaylistController::class, 'update'])->name('playlists.update');
Route::delete('/playlists/{id}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');

Route::middleware(['auth', 'check.user.active', 'check.user.verified', 'role:admin'])->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
});

Route::get('/profile/upload', [ProfilePictureController::class, 'create'])->name('profile.upload');
Route::post('/profile/upload', [ProfilePictureController::class, 'store'])->name('profile.store');
Route::get('/profile/gallery', [ProfilePictureController::class, 'gallery'])->name('profile.gallery');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'check.user.active', 'check.user.verified'])->name('dashboard');

Route::middleware(['auth', 'check.user.active'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('my-orders')->name('my-orders.')->group(function () {
        Route::view('/', 'my-orders')->name('index');
    });
});

require __DIR__.'/auth.php';
