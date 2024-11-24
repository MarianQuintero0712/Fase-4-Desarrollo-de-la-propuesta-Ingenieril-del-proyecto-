<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        try {
            $hstsMaxAge = 31536000;
            $permissionsPolicy = "fullscreen=(), accelerometer=(), battery=(), camera=(), " .
                "geolocation=(), gyroscope=(), magnetometer=(), microphone=()";
            $contentSecurityPolicy =
                "default-src 'none'; frame-src 'self'; script-src 'self' https://maps.googleapis.com/;" .
                " style-src 'self' https://maxcdn.bootstrapcdn.com/ https://fonts.googleapis.com/" .
                " https://use.fontawesome.com/ https://netdna.bootstrapcdn.com/;" .
                " media-src 'self'; font-src 'self' https://maxcdn.bootstrapcdn.com/" .
                " https://fonts.googleapis.com/ https://fonts.gstatic.com/ https://use.fontawesome.com/;" .
                " img-src 'self' data:; frame-ancestors 'self'; form-action 'self'; " .
                "connect-src 'self' " . config('app.url');
            $allowedMethods = 'POST';
            $allowedHeaders = 'Content-Type, Accept, Authorization, X-Requested-With, Application';
            $allowedOrigin = config('app.url');
            //cors
            $response->headers->set('Access-Control-Allow-Origin', $allowedOrigin);
            $response->headers->set('Access-Control-Allow-Methods', $allowedMethods);
            $response->headers->set('Access-Control-Allow-Headers', $allowedHeaders);
            $response->headers->set('Cache-Control', 'must-revalidate, no-cache, no-store, private');
            $response->headers->set('Content-Security-Policy', $contentSecurityPolicy);
            $response->headers->set('Strict-Transport-Security', "max-age=$hstsMaxAge; includeSubDomains; preload;");
            $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
            $response->headers->set('X-Content-Type-Options', 'nosniff');
            $response->headers->set('X-Xss-Protection', '1; mode=block');
            $response->headers->set('Permissions-Policy', $permissionsPolicy);
            return $response;
        } catch (\Throwable $th) {
            return response()->json("Error al procesar la solicitud. Por favor, intenta de nuevo más tarde.", 400);
        }
    }
}
