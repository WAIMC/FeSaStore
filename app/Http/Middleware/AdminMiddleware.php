<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AdminMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'adminAuth')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('admin.login');
        }

        $name = $request->route()->getName();
        if(Auth::guard('adminAuth')->user()->cant($name)){
            abort(403,'Unauthorized');
        }
        
        return $next($request);
    }
}
