<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', fn() => redirect('/id'));

Route::prefix('{lang}')
    ->where(['lang' => 'id|en'])
    ->middleware('setLocale')
    ->group(function () {

        Route::get('/', [PageController::class, 'home'])->name('home');
        
        Route::get('/services', [PageController::class, 'services'])->name('services');
        Route::get('/services/{slug}', [PageController::class, 'serviceDetail'])
            ->name('service.detail');

        Route::get('/products', [PageController::class, 'products'])->name('products');
        Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
        Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    });
