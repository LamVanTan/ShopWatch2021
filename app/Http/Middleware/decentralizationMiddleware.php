<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class decentralizationMiddleware
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
            $permission = Auth::user()->permission;
            if($permission !== 2){
             return redirect()->back()->with('message', 'Bạn không sử dụng được chức năng này');
            }
        }
        return $next($request);
    }
}
