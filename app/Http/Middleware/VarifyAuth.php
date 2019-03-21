<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Redirect;

class VarifyAuth
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

        if (!Session::has('user')) {
            return redirect::route('adminIndex')->with('error', 'You must Log In!!');;
        }
        return $next($request);
    }
}
