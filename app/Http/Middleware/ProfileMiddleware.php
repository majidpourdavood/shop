<?php

namespace App\Http\Middleware;

use Closure;

class ProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {

            if ( auth()->user()->step == 3 || auth()->user()->step == null) {
                alert()->success('اطلاعات ارسالی شما در حال بررسی می باشد ', 'بررسی اطلاعات')
                    ->confirmButton('بستن')->autoclose(3000);
                return redirect()->route('panel.dashboard');
            }
        }
        return $next($request);
    }
}
