<?php

use Illuminate\Support\Facades\Route;
use Modules\Petani\Http\Controllers\ProdukController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/petani/produk', [ProdukController::class, 'index'])->name('petani.produk.index');
    Route::get('/petani/produk/data', [ProdukController::class, 'getData'])->name('petani.produk.data');
    Route::post('/petani/produk', [ProdukController::class, 'store'])->name('petani.produk.store');
    Route::get('/petani/produk/{id}/edit', [ProdukController::class, 'edit'])->name('petani.produk.edit');
    Route::put('/petani/produk/{id}', [ProdukController::class, 'update'])->name('petani.produk.update');
    Route::delete('/petani/produk/{id}', [ProdukController::class, 'destroy'])->name('petani.produk.destroy');
});