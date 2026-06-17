<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Security headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');

        // Content Security Policy
        $response->headers->set('Content-Security-Policy', 
            "default-src 'self'; " .
            "script-src 'self' 'unsafe-inline' 'wasm-unsafe-eval' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://unpkg.com; " .
            "style-src 'self' 'unsafe-inline'; " .
            "img-src 'self' data: blob: https:; " .
            "font-src 'self' data:; " .
            "worker-src 'self' blob: https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://unpkg.com; " .
            "connect-src 'self' blob: https://api.timeweb.cloud https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://unpkg.com https://tessdata.projectnaptha.com;"
        );

        return $response;
    }
}

