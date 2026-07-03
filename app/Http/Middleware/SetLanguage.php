<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLanguage
{
    public function handle(Request $request, Closure $next)
    {
        $supportedLocales = ['en', 'nl'];
        $locale = session('locale', config('app.locale'));

        if (! in_array($locale, $supportedLocales, true)) {
            $locale = config('app.fallback_locale', 'en');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
