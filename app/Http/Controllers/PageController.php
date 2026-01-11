<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Expertise;
use App\Models\HomeContent;
use App\Models\PrecisionSection;
use App\Models\Stat;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\CtaSection;
use App\Models\PageHeader;
use App\Models\Service;
use App\Models\Product;
use App\Models\ProductCategory;

class PageController extends Controller
{
    public function home()
    {
        $content = HomeContent::first();
        $stats = Stat::all();
        $clients = Client::all();
        $expertises = Expertise::all();
        $precision = PrecisionSection::with('items')->first();
        //$projects = Project::latest()->take(4)->get();
        $projects = Project::latest()->get();
        $certificates = Certificate::all();
        $cta = CtaSection::first();

        return view('pages.home', compact('content', 'stats', 'clients', 'expertises', 'precision', 'projects', 'certificates', 'cta'));
    }

    public function services()
    {
        $header = PageHeader::where('page', 'services')->firstOrFail();
        $services = Service::all();
        $certificates = Certificate::all();
        $cta = CtaSection::first();
        $stats = Stat::all();

        return view('pages.services', compact('header', 'services', 'certificates', 'cta', 'stats'));
    }

    public function serviceDetail($lang, $slug)
    {
        $header = PageHeader::where('page', 'services')->firstOrFail();

        $service = Service::where('slug', $slug)->firstOrFail();

        // service lain untuk grid bawah (kecuali yang aktif)
        $otherServices = Service::where('id', '!=', $service->id)->get();

        $cta = CtaSection::first();

        $stats = Stat::all();

        return view('pages.service-detail', compact(
            'header',
            'service',
            'otherServices',
            'cta',
            'stats'
        ));
    }

    public function products(Request $request)
    {
        $header = PageHeader::where('page', 'products')->firstOrFail();
        $categories = ProductCategory::all();

        $products = Product::with('category')
            ->when($request->category, function ($q) use ($request) {
                $q->whereHas('category', function ($cat) use ($request) {
                    $cat->where('slug', $request->category);
                });
            })
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($sub) use ($request) {
                    $sub->where('name_id', 'like', "%{$request->search}%")
                        ->orWhere('name_en', 'like', "%{$request->search}%");
                });
            })
            ->paginate(6)
            ->withQueryString();

        if ($request->ajax()) {
            return view('pages.partials.product-grid', compact('products'))->render();
        }

        $certificates = Certificate::all();
        $cta = CtaSection::first();

        return view('pages.products', compact(
            'header',
            'categories',
            'products',
            'certificates',
            'cta'
        ));
    }

    public function productDetail($lang, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Related products (simple & safe)
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->latest()
            ->paginate(3, ['*'], 'related_page')
            ->withQueryString();

        if (request()->ajax()) {
            return view('pages.partials.related-products', compact('relatedProducts'))->render();
        }

        $header = PageHeader::where('page', 'products')->first();
        $cta = CtaSection::first();

        return view('pages.product-detail', compact(
            'product',
            'relatedProducts',
            'header',
            'cta'
        ));
    }

    public function portfolio()
    {
        return view('pages.portfolio');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
