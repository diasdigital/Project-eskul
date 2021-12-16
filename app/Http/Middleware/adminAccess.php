<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminAccess
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
        abort_if(auth()->user()->id_eskul, 403, 'Anda bukan administrator');

        return $next($request);
    }
}
