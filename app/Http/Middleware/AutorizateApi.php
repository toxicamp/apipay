<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutorizateApi
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
        if ($request->wantsJson()) {
            $user = User::where('api_token', $request->bearerToken())->first();

            if (!$user){
                $response = $next($request);
                return $response->json(['error' => 'Not authorized.'],403);
            }

            $request->merge(['user' => $user ]);
            $request->setUserResolver(function () use ($user) {
                return $user;
            });

        }
        return $next($request);
    }
}
