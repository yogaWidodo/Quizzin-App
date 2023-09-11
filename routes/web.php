<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/callback', [GoogleController::class, 'handleGoogleCallback']);

// Route::get('auth/twitter', [TwitterController::class, 'redirectToTwitter']);
// Route::get('auth/callback', [TwitterController::class, 'handleTwitterCallback']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
