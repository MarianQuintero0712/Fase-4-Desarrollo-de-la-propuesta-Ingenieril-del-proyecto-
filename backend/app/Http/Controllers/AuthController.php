<?php

namespace App\Http\Controllers;

use App\BLL\AuthBLL;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Auth;
use App\Http\Requests\Register;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(Auth $request): JsonResponse
    {
        return AuthBLL::login($request);
    }

    public function register(Register $request)
    {
        return AuthBLL::register($request->only(['name','email', 'password']));
    }

    public function logout(): JsonResponse
    {
        return AuthBLL::logout();
    }

    public function refresh(): JsonResponse
    {
        return AuthBLL::refresh();
    }

    public function me()
    {
        return response()->json(['name' => auth()->user()->name]);
    }

}