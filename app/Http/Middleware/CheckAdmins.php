<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Carbon\Carbon;
class CheckAdmins
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
        $dayEnd = strtotime( Carbon::now());
        $dayStart =strtotime(session('account')->created_at);
        $dayDiff=floor(($dayEnd-$dayStart)/(60*60*24));
        if(session('account')){
            if (session('account')->role==0) {
                return redirect('/');
            }else{
                if (session('account')->active>=1) {
                    return $next($request);
                }else{
                    return redirect('/admin/loiactive');
                }
            }

        }else{
            return redirect('/admin');
        }
    }
}
