<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\ExpertiseController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\PrecisionSectionController;
use App\Http\Controllers\Admin\PrecisionItemController;
use App\Http\Controllers\Admin\CtaSectionController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\CertificateController;

Route::get('/', fn() => redirect('/id'));

Route::prefix('{lang}')
    ->where(['lang' => 'id|en'])
    ->middleware('setLocale')
    ->group(function () {

        Route::get('/', [PageController::class, 'home'])->name('home');

        Route::get('/services', [PageController::class, 'services'])->name('services');
        Route::get('/services/{slug}', [PageController::class, 'serviceDetail'])->name('service.detail');

        Route::get('/products', [PageController::class, 'products'])->name('products');
        Route::get('/products/{slug}', [PageController::class, 'productDetail'])->name('product.detail');

        Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
        Route::get('/portfolio/{slug}', [PageController::class, 'portfolioDetail'])->name('portfolio.detail');

        Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    });

use App\Http\Controllers\Admin\AuthController;

Route::prefix('admin')->group(function () {

    // LOGIN
    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // PROTECTED AREA
    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('admin.dashboard');
    });

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::get('/home', [HomeContentController::class, 'edit'])
            ->name('admin.home.edit');

        Route::post('/home', [HomeContentController::class, 'update'])
            ->name('admin.home.update');
    });

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::resource('home-stats', StatController::class)
            ->except(['show'])
            ->names('admin.stats');
    });

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::resource('home-expertise', ExpertiseController::class)
            ->except(['show'])
            ->names('admin.expertise');
    });


    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::resource('home-clients', ClientController::class)
            ->except(['show'])
            ->names('admin.clients');
    });

    Route::middleware('auth')->prefix('admin')->group(function () {

        Route::get('/home-precision', [PrecisionSectionController::class, 'edit'])
            ->name('admin.precision.edit');

        Route::post('/home-precision', [PrecisionSectionController::class, 'update'])
            ->name('admin.precision.update');

        Route::resource('home-precision-items', PrecisionItemController::class)
            ->except(['show'])
            ->names('admin.precision.items');
    });

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::get('/cta', [CtaSectionController::class, 'edit'])
            ->name('admin.cta.edit');

        Route::post('/cta', [CtaSectionController::class, 'update'])
            ->name('admin.cta.update');
    });

    Route::middleware('auth')->prefix('admin')->group(function () {

        Route::get('/footer', [FooterController::class, 'edit'])
            ->name('admin.footer.edit');
        Route::post('/footer', [FooterController::class, 'update'])
            ->name('admin.footer.update');

        Route::get('/contact', [ContactController::class, 'edit'])
            ->name('admin.contact.edit');
        Route::post('/contact', [ContactController::class, 'update'])
            ->name('admin.contact.update');
    });

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::resource('services', ServiceController::class)
            ->except(['show'])
            ->names('admin.services');
    });

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::resource('products', ProductController::class)
            ->except(['show'])
            ->names('admin.products');
    });

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::resource('projects', ProjectController::class)
            ->except(['show'])
            ->names('admin.projects');
    });

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::resource('project-categories', ProjectCategoryController::class)
            ->except(['show'])
            ->names('admin.project-categories');
    });

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::resource('certificates', CertificateController::class)
            ->except(['show'])
            ->names('admin.certificates');
    });
});
