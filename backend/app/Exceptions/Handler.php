<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        // Detine la propagación de la excepción a la pila de registro predeterminada `The token has been blacklisted`
        $this->reportable(function (Throwable $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
                return false;
            }
        });

        $this->renderable(function (Throwable $e) {

            if($e instanceof \Illuminate\Contracts\Encryption\DecryptException)
            {
                return response()->json([
                    'message' => 'Credenciales incorrectas',
                    'errors' => [
                        'exception' => 'Credenciales incorrectas'
                    ]
                ], 400);
            }
            
            if ($e instanceof ValidationException) 
            {
                return response()->json([
                    'message' => $e->getMessage(),
                    'errors' => [
                        'exception' => $e->getMessage()
                    ]
                ], 400);
            } 

        });
    }
}
