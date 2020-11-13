<?php

namespace CustomComponent\SiteMenu\Http\Middleware;

use CustomComponent\SiteMenu\SiteMenu;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(SiteMenu::class)->authorize($request) ? $next($request) : abort(403);
    }
}
