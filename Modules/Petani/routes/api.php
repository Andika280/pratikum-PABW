<?php

use Illuminate\Support\Facades\Route;
use Modules\Petani\Http\Controllers\PetaniController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('petanis', PetaniController::class)->names('petani');
});
