<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class AuthResource extends JsonResource
{
    public function toArray($request)
    {
        if ($this->resource) {
            return [
                'access_token' => $this->resource,
                'token_type' => 'Bearer',
            ];
        } else {
            return [
                'errors' => [
                    'message' => 'Credenciales incorrectas'
                ]
            ];
        }
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(400);
    }
}
