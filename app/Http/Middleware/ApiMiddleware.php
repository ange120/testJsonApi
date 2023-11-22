<?php

namespace App\Http\Middleware;

use App\Helpers\KeyHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('Authorization') !==  'testBearer23129912') {
            return new Response('Unauthorized', 401);
        }
        return $next($request);
    }
}
