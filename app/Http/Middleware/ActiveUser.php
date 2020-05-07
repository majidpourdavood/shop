<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Cache;

class ActiveUser
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
        if(auth()->check()) {
            if(auth()->user()->active == 0) {
                auth()->logout();
                alert()->error('خطا', 'اکانت شما هنوز فعال نشده است')->autoclose('3000');
                return redirect('/');
            }
        }

        return $next($request);
    }
}
