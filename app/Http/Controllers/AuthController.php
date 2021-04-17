<?php

namespace App\Http\Controllers;

use App\Http\Services\AppValidator;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
        public function register(Request $request)
        {
            $fields = AppValidator::register($request);

            $response = User::createUser($fields);

            return response($response, 201);
        }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
        public function login(Request $request)
        {
            $fields = AppValidator::login($request);

            $response = User::loginUser($fields);

            if (!isset($response['user'])) {
                return response($response, 401);
            }

            return response($response, 201);
        }


        /**
         * @param Request $request
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
         */
        public function logout(Request $request)
        {
            auth()->user()->tokens()->delete();

            return response(['message' => 'Logged out'], 200);
        }
}
