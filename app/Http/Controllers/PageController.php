<?php

namespace App\Http\Controllers;

use App\Models\HomeContent;
use App\Models\Stat;
use App\Models\Client;
use App\Models\Expertise;

class PageController extends Controller
{
    public function home()
    {
        $content = HomeContent::first();
        $stats = Stat::all();
        $clients = Client::all();
        $expertises = Expertise::all();

        return view('pages.home', compact('content', 'stats', 'clients', 'expertises'));
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
