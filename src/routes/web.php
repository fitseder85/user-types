<?php

use Fitseder85\UserTypes\Https\Controllers\UserTypeController;
use Illuminate\Support\Facades\Route;

Route::prefix('userTypes')->name('userTypes')->middleware(['web'])->group(function () {
    Route::get('/', [UserTypeController::class, 'index']);
    Route::get('/create', [UserTypeController::class, 'create'])->name('.create');
    Route::post('/store', [UserTypeController::class, 'store'])->name('.store');
    Route::get('/{userType}', [UserTypeController::class, 'show'])->name('.show');
    Route::get('/edit/{userType}', [UserTypeController::class, 'edit'])->name('.edit');
    Route::put('/update/{userType}', [UserTypeController::class, 'update'])->name('.update');
    Route::put('/status/{userType}', [UserTypeController::class, 'status'])->name('.status');
    Route::put('/destroy', [UserTypeController::class, 'destroy'])->name('.destroy');
});
