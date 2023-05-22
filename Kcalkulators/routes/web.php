<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProduktController;
use App\Http\Controllers\ContactController;
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

Route::get('dbconn', function () {
    return view('dbconn');
});
Route::get('sazinies', function () {
    return view('sazinies');
});
Route::get('atsauksmes', function () {
    return view('atsauksmes');
});
Route::get('edieni', function () {
    return view('edieni');
});
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
Route::get('/index', [ProduktController::class, 'index']);
Route::get('/index/{id}', 'ProduktController@show')->name('produkts.show');

Route::get('/search', [ProduktController::class, 'search']);

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

