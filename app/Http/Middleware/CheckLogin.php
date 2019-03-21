<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Redirect;

class CheckLogin
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

        if (Session::has('student') || Session::has('teacher')) {
            return redirect::route('root');
        }
        return $next($request);
    }
}
