<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->route('lang');

        if (! in_array($lang, ['id', 'en'])) {
            $lang = config('app.fallback_locale');
        }

        App::setLocale($lang);

        return $next($request);
    }
}
