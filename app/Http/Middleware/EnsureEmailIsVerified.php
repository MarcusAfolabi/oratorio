<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->verified) {
        return redirect()->route('participant.email');
    }
        return $next($request);
    }
}
