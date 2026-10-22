<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\DataController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\BanjirController;
use App\Http\Controllers\LaporBanjirController;
use App\Http\Controllers\AgrilinkController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, Andika';
});

Route::get('/user/{name}', function ($name) {
    return "Halo Saya " . $name;
});

Route::get('/greet/{name?}', function ($name = 'Guest') {
    return "Halo, " . $name;
});

Route::get('/about', function () {
    return view('about', ['name' => 'Andika']);
});


Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/lapor', [LaporBanjirController::class, 'index'])->name('lapor.index');
});

Route::get('/lapor/tambah', [LaporBanjirController::class, 'create'])->name('lapor.create');
Route::post('/lapor/kirim', [LaporBanjirController::class, 'store'])->name('lapor.store');

Route::get('/home', [AgrilinkController::class, 'index'])->name('home');
Route::get('/marketplace', [AgrilinkController::class, 'marketplace'])->name('marketplace');

Route::get('/form', [DataController::class, 'form']);
Route::post('/proses', [DataController::class, 'proses']);

Route::get('/lapor-banjir', [BanjirController::class, 'index']);
Route::post('/proses-banjir', [BanjirController::class, 'proses']);

Route::get('/layanan', [LayananController::class, 'form']);
Route::post('/layanan/proses', [LayananController::class, 'proses']);