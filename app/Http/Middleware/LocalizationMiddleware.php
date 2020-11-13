<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Jenssegers\Date\Date;

class LocalizationMiddleware
{
    protected $defLang = 'ru';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $segment = request()->header('Language');
        $segment = $segment ? $segment : $this->defLang;

        $currentLanguage = Language::where(['code' => $segment])->first();

        // check on exist active lang
        if(!$currentLanguage) {
            response()->error('lang_not_found', 404);
        }

        config()->set('current_language_id', $currentLanguage->id);
        app()->setLocale($segment);

        return $next($request);
    }
}
