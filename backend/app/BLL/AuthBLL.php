<?php

namespace App\BLL;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\JsonResponse;
use App\DAL\AuthDAL;;

class AuthBLL
{
    public static function login(Request $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);
    
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Credenciales incorrectas']);
        }
    
        // Usuario autenticado después de attempt
        $user = auth()->user();
    
        // Añadir claims personalizados
        $customClaims = [
            'name' => $user->name,
            'ipa' => hash("sha512", $request->ip()),
            'ura' => hash("sha512", $request->userAgent())
        ];
    
        // Generar un nuevo token con los claims personalizados
        $token = auth()->claims($customClaims)->login($user);
    
        return self::respondWithToken($token);
    }
    

    public static function register(array $data)
    {
        return AuthDAL::register($data);
    }

    private static function decrypt(array $credentials): array
    {
        $credential['username'] = Crypt::decrypt($credentials['username']);
        $credential['password'] = Crypt::decrypt($credentials['password']);
        return $credential;
    }

    public static function logout(): JsonResponse
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public static function refresh(): JsonResponse
    {
        return self::respondWithToken(auth()->refresh());
    }

    protected static function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
