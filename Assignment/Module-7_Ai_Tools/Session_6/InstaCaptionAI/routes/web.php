<?php

use App\Http\Controllers\CaptionController;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/caption', function () {
    return view('ai_caption');
})->name('caption.form');

Route::post('/caption', [CaptionController::class, 'generateCaption'])
    ->name('caption.input');
