<?php

namespace App\Http\Middleware;

use Closure;

class Setting
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if(date('Y-m-d') >= '3021-05-13')
        // {
        //     return redirect('/login');
        // }

        return $next($request);
    }
}
