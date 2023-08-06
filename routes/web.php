<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SatuanController;
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

// Provider Google
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

// Not Provider
// Route::get('/auth/google', [ProviderController::class, 'redirect'])->name('google-auth');
// Route::get('/auth/google/callback', [ProviderController::class, 'callback']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/create', [ProductController::class, 'view'])->name('view');
    Route::post('/create', [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [ProductController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');

    // Satuan
    Route::get('/satuan', [SatuanController::class, 'index'])->name('satuan');
    Route::post('/satuan', [ProductController::class, 'tambahsatuan'])->name('tambahsatuan');

    // Kategori
    Route::get('/kategori', [ProductController::class, 'lihat'])->name('kategori');
    Route::post('/kategori', [ProductController::class, 'tambahkategori'])->name('tambahkategori');
});


require __DIR__ . '/auth.php';
