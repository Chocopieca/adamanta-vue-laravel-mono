<?php

namespace CustomComponent\AccessControl\Http\Middleware;

use CustomComponent\AccessControl\AccessControl;

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
        return resolve(AccessControl::class)->authorize($request) ? $next($request) : abort(403);
    }
}
