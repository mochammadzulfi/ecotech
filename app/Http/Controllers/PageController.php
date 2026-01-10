<?php

namespace App\Http\Controllers;

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

        return view('pages.service-detail', compact('header', 'service'));
    }

    public function products()
    {
        return view('pages.products');
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
