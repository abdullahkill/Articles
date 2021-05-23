<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authcheck
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

        if(!session()->has('LoggedUser') && ($request->path() !='signin' && $request->path() !='signup' )){
            return redirect('signin ')->with('fail','You must be logged in');
        }
        
        if(session()->get('role') == 2 && ($request->path() == 'agentDashboard'|| $request->path() == 'admin/category'|| $request->path() == 'view_writer'|| $request->path() == 'view_agent'|| $request->path() == 'writer'|| $request->path() == 'agent'|| $request->path() == 'project'|| $request->path() == 'post_project'|| $request->path() == 'students'||$request->path() =='signin' || $request->path() =='signup')){
        
            return back();
         }
         if(session()->get('role') == 3 && ($request->path() == 'writerDashboard'|| $request->path() == 'admin/category'|| $request->path() == 'view_writer'|| $request->path() == 'view_agent'|| $request->path() == 'writer'|| $request->path() == 'agent'||$request->path() =='signin' || $request->path() =='signup')){
        
            return back();
         }
         if(session()->get('role') == 1 && ($request->path() == 'writerDashboard'|| $request->path() == 'agentDashboard'|| $request->path() == 'project'|| $request->path() == 'post_project'|| $request->path() == 'students'||$request->path() =='signin' || $request->path() =='signup')){
        
            return back();
         }
        
        return $next($request);
    }
}
