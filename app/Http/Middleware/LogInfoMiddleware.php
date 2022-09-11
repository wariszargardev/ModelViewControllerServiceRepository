<?php

namespace App\Http\Middleware;

use App\Models\LogInfo;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Log;

class LogInfoMiddleware
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
        $log = [
            'url'=> $request->getUri(),
            'method'=> $request->getMethod(),
            'real_method'=> $request->getRealMethod(),
            'body'=> $request->all(),
            'content'=> $request->getContent(),
            'content_type'=> $request->getContentType(),
            'action' => $request->route()->getAction(),
            'controller' => $request->route()->getController(),
        ];

        $logInfo = new LogInfo();
        $logInfo->url = $request->getUri();
        $logInfo->method = $request->getMethod();
        $logInfo->body = json_encode($request->all());
        $logInfo->response = $request->getContent();

        $logInfo->save();
        Log::info(json_encode($log));

        return $next($request);
    }
}
