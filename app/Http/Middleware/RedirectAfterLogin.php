<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectAfterLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()){
            if (Auth::user()->user_type == 'Employer') {
                return redirect(RouteServiceProvider::Employer);
            }elseif(Auth::user()->user_type == 'Employee' ){
                return redirect(RouteServiceProvider::Employee);
            }
            return redirect()->route('/');
        }

        return redirect()->route('front.home');
        //return $next($request);
    }
}
