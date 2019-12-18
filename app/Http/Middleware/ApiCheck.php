<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\UserService;

class ApiCheck
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
        $userService = (new UserService);
        $user = $userService->findApiToken($request->header('app-auth-token'));

        if ($user) {
            auth()->login($user);

            return $next($request);
        }

        abort(404);

    }
}
