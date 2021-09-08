<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckName
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
        //die('vaibhav');
        if($request->name)
        {
            return $next($request);
            //die('404');

        } else {
            return redirect()->route('products.index');
            //die('404');
        }
    }
}
