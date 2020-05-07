<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if ($request->user()->hasRole($role)) {

            return $next($request);
        } else {

            alert()->error('شما به این بخش دسترسی ندارید .')->confirmButton('بستن');
            return back();

        }

    }
}
