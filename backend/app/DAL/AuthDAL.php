<?php

namespace App\DAL;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthDAL
{

    public static function register(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Hashear la contraseña
        ]);
    }

}