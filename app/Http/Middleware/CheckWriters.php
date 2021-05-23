<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckWriters
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
        dd( session()->get('LoggedUser'));
        if(session()->has('role') == 2 && ($request->path() == 'agentDashboard'||$request->path() == 'view_agent'||$request->path() == 'view_writer'||$request->path() == 'agent'||$request->path() == 'writer'||$request->path() == 'signin' || $request->path() == 'signup')){
            return back();
             }
                
    }
}
