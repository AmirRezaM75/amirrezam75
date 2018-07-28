<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
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
        if(Auth::check()){
            if(Auth::user()->isAdmin() or Auth::user()->isAuthor()){
                return $next($request);
            } else {
                return redirect(403);
            }
        } else {
            $request->session()->flash('message','برای دسترسی به قسمت ادمین باید لاگین کنید.');
            return redirect('/login');
        }

    }
}
