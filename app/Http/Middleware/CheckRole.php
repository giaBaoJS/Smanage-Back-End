<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CheckRole
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
        if(session('account')){
            if (session('account')->active==0) {
                return redirect('/admin/loiactive');
            }else{
                if (session('account')->role==0) {
                    return redirect('/');
                }else if (session('account')->role==1) {
                    return redirect('/admin/loitruycap');
                }else{
                    return $next($request);
                }
            }

        }else{
            return redirect('/admin');
        }
    }
}
