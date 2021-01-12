<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckFix
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->vacation->fix)
        {
            abort(403);
        }
        
        return $next($request);
    }
}
