<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (! auth()->check() || auth()->user()->roles->count() < 1) {
            abort(404);
        }

        $user = auth()->user();
        $user_roles = $user->roles->pluck('name')->toArray();
        $user_roles = array_map('strtolower', $user_roles);

        if (! count(array_intersect($user_roles, $roles))) {
            abort(404);
        }

        return $next($request);
    }
}
