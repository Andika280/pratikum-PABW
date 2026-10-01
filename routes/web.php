<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\LayananController;
use App\Http\Controllers\BanjirController;





use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, Andika';
});

Route::get('/user/{Andika}', function ($name) {
    return "Halo Saya " . $name;
});

Route::get('/greet/{Andika?}', function ($name = 'Guest') {
    return "Halo, " . $name;
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/about', function () {
    return view('about', ['name' => 'Nama Anda']);
});

Route::get('/form', [DataController::class, 'form']);
Route::post('/proses', [DataController::class, 'proses']);

Route::get('/lapor-banjir', [BanjirController::class, 'index']);
Route::post('/proses-banjir', [BanjirController::class, 'proses']);

Route::get('/layanan', [LayananController::class, 'form']);
Route::post('/layanan/proses', [LayananController::class, 'proses']);



Route::get('/', [StudentController::class, 'index'])->name('students.index');