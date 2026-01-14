<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\FooterContent;
use App\Models\Service;
use App\Models\Product;
use App\Models\Contact;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        view()->composer('partials.footer', function ($view) {

            $services = Service::where('is_featured', 1)
                ->orderBy('id')
                ->take(4)
                ->get();

            $products = Product::where('is_featured', 1)
                ->orderBy('id')
                ->take(4)
                ->get();

            $footer = FooterContent::first();

            $view->with(compact('services', 'products', 'footer'));
        });

        view()->composer('*', function ($view) {
            $contact = Contact::first();
            $view->with('contact', $contact);
        });
    }
}
