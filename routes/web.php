<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporBanjirController;
use App\Http\Controllers\AgrilinkController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LayananController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');


Route::get('/home', [AgrilinkController::class, 'index'])->name('home');
Route::get('/marketplace', [AgrilinkController::class, 'marketplace'])->name('marketplace');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    

    Route::resource('lapor-banjir', LaporBanjirController::class);
    
    Route::resource('produk', ProdukController::class);
});

Route::get('/form', [DataController::class, 'form']);
Route::post('/proses', [DataController::class, 'proses']);
Route::get('/layanan', [LayananController::class, 'form']);
Route::post('/layanan/proses', [LayananController::class, 'proses']);