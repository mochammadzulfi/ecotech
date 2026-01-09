<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', fn() => redirect('/id'));

Route::prefix('{lang}')
    ->middleware('setLocale')
    ->group(function () {

        Route::get('/', [PageController::class, 'home']);
        Route::get('/services', [PageController::class, 'services']);
        Route::get('/products', [PageController::class, 'products']);
        Route::get('/portfolio', [PageController::class, 'portfolio']);
        Route::get('/contact', [PageController::class, 'contact']);
    });
