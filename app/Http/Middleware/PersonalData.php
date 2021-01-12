<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PersonalData
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
        // если принадлежит авторизованному пользователю - пропустить
        if ($request->vacation->user_id != $request->user()->id)
        {
            abort(403);
        }
        return $next($request);
    }
}
