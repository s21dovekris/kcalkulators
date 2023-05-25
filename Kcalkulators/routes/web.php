<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProduktController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RecepteController;
use App\Http\Controllers\RecepteProduktsController;

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

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
Route::post('/logout', [GoogleAuthController::class, 'logout'])->name('logout');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/produkts', [ProduktController::class, 'index'])->name('produkts.index');
Route::get('/produkts/search', [ProduktController::class, 'search'])->name('produkts.search');
Route::get('/produkts/{id}', [ProduktController::class, 'showInfo'])->name('produkts.info');
Route::get('/produkts/{id}/edit', [ProduktController::class, 'edit'])->name('produkts.edit');
Route::put('/produkts/{id}', [ProduktController::class, 'update'])->name('produkts.update');
Route::get('/produkts/create', [ProduktController::class, 'create'])->name('produkts.create');
Route::post('/produkts', [ProduktController::class, 'store'])->name('produkts.store');

Route::get('/receptes', [RecepteController::class, 'index'])->name('receptes.index');
Route::get('/receptes/create', [RecepteController::class, 'create'])->name('receptes.create');
Route::post('/receptes', [RecepteController::class, 'store'])->name('receptes.store');
Route::get('/receptes/search', [RecepteController::class, 'search'])->name('receptes.search');
Route::get('/receptes/{id}', [RecepteController::class,'showInfo'])->name('receptes.show');
Route::get('/receptes/{id}/edit', [RecepteController::class, 'edit'])->name('receptes.edit');
Route::put('/receptes/{id}', [RecepteController::class, 'update'])->name('receptes.update');
Route::get('/search/product', [ProduktController::class, 'searchForProduct'])->name('product.search');