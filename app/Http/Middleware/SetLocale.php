<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Supported locales.
     */
    const SUPPORTED = ['en', 'zh', 'ms'];

    /**
     * Handle an incoming request.
     * Priority: session → cookie → browser Accept-Language → default (en)
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = null;

        // 1. Check session (set by LanguageController::switch)
        if ($request->session()->has('locale')) {
            $locale = $request->session()->get('locale');
        }

        // 2. Fall back to cookie (persists across sessions)
        if (!$locale && $request->cookie('locale')) {
            $locale = $request->cookie('locale');
        }

        // 3. Fall back to browser Accept-Language header
        if (!$locale) {
            $browserLang = substr($request->header('Accept-Language', 'en'), 0, 2);
            if (in_array($browserLang, self::SUPPORTED)) {
                $locale = $browserLang;
            }
        }

        // 4. Default
        if (!$locale || !in_array($locale, self::SUPPORTED)) {
            $locale = config('app.locale', 'en');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
