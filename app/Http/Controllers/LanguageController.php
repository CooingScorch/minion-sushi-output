<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    /** Available languages */
    const SUPPORTED = ['en', 'zh', 'ms'];

    /**
     * Switch app language.
     * Stores in:  session('locale')  +  cookie 'locale' (365 days)
     * Marks:      session('language_chosen') = true  (hides modal)
     */
    public function switch(Request $request, string $lang)
    {
        if (!in_array($lang, self::SUPPORTED)) {
            $lang = 'en';
        }

        // Store in session
        $request->session()->put('locale', $lang);
        $request->session()->put('language_chosen', true);

        // Store in cookie (persists across browser sessions)
        Cookie::queue('locale', $lang, 60 * 24 * 365); // 365 days

        // Set for current request
        app()->setLocale($lang);

        return redirect()->back()->withCookie(Cookie::make('locale', $lang, 60 * 24 * 365));
    }
}
