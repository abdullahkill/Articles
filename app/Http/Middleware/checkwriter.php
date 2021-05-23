<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkwriter
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
        if(Auth::check() && Auth::session()->get('role') == 2 && ($request->path() == 'agentDashboard')){
        
            return back();
         }
       
        return $next($request);
        }
}
