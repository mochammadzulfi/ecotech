<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Expertise;
use App\Models\HomeContent;
use App\Models\PrecisionSection;
use App\Models\Stat;
use App\Models\Project;
use App\Models\Certificate;

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
        $projects = Project::all();
        $certificates = Certificate::all();

        return view('pages.home', compact('content', 'stats', 'clients', 'expertises', 'precision', 'projects', 'certificates'));
    }

    public function services()
    {
        return view('pages.services');
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
