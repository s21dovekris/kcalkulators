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

Route::get('atsauksmes', function () {
    return view('atsauksmes');
});

Route::get('ediens/edieni', function () {
    return view('ediens/edieni');
});

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

Route::get('/produkts', [ProduktController::class, 'index'])->name('produkts.index');
Route::get('/produkts/{id}', [ProduktController::class, 'showInfo'])->name('produkts.info');

Route::get('/produkts/{id}/edit', [ProduktController::class, 'edit'])->name('produkts.edit');
Route::put('/produkts/{id}', [ProduktController::class, 'update'])->name('produkts.update');

Route::get('/produkts/jaunsprodukts', [ProduktController::class, 'jaunsprodukts'])->name('produkts.jaunsprodukts');
Route::post('/produkts', [ProduktController::class, 'store'])->name('produkts.store');

Route::get('/search', [ProduktController::class, 'search']);

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

