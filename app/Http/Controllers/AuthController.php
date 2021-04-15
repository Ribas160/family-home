<?php

namespace App\Http\Controllers;

use App\Http\Services\AppValidator;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{


        public function register(Request $request)
        {
            $fields = AppValidator::register($request);

            $response = User::createUser($fields);

            return response($response, 201);
        }


        public function login(Request $request)
        {
            $fields = AppValidator::login($request);

            $response = User::loginUser($fields);

            if (!isset($response['user'])) {
                return response($response, 401);
            }

            return response($response, 201);
        }


        public function logout(Request $request)
        {
            auth()->user()->tokens()->delete();

            return response(['message' => 'Logged out'], 200);
        }
}
