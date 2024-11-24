<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use JWTAuth;

class Jwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $payload = JWTAuth::parseToken()->getPayload();
    
        if ($payload) {
            $ipaHash = hash("sha512", $request->ip());
            $uraHash = hash("sha512", $request->userAgent());
    
            if ($payload->get("ipa") !== $ipaHash || $payload->get('ura') !== $uraHash) {
                return response()->json([
                    "message" => "El token JWT no es válido",
                    "errors" => [
                        "exception" => "El token JWT no es válido"
                    ]
                ], 400);
            }
        }
    
        return $next($request);
    }
}
