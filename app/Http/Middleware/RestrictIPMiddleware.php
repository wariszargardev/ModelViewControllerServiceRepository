<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictIPMiddleware
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
        $restrictIp = [
            '127.0.0.1',
            '127.0.0.1',
            '204.85.191.9',
            '205.170.62.207',
            '205.185.115.33',
            '205.209.253.161',
            '207.255.225.253',
            '209.141.57.178',
            '212.227.115.239',
            '213.202.223.95',
            '217.79.179.7',
        ];

        // if !in_array() then only those ip will see the websi
        if (in_array($request->ip(),$restrictIp)) {

            abort(403, 'You are not authorized to access this site.');
        }

        return $next($request);
    }
}
