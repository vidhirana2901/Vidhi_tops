<?php

use App\Http\Controllers\PlaylistAIController;
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

Route::get('/playlist/summary', [PlaylistAIController::class, 'showSummaryForm'])
    ->name('playlist.summary.form');
Route::post('/playlist/summary', [PlaylistAIController::class, 'generatePlaylistDescription'])
    ->name('playlist.summary.generate');
