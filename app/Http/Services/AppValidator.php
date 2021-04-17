<?php

namespace App\Http\Services;


class AppValidator
{


    /**
     * @param object $request
     * @return mixed
     */
    public static function register(object $request)
    {
        return $request->validate([
            'name' => 'required|string|unique:users,name',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed',
        ],
        [
            'name.required' => 'Имя не может быть пустым',
            'name.string' => 'Имя пользователя должно быть строкой',
            'name.unique' => 'Пользователь с таким именем уже зарегестрирован',
            'email.required' => 'Email не может быть пустым',
            'email.string' => 'Email должен быть строкой',
            'email.email' => 'Не верный формат email адреса',
            'email.unique' => 'Пользователь с таким email уже зарегестрирован',
            'password.required' => 'Пароль не может быть пустым',
            'password.string' => 'Пароль должен быть строкой',
            'password.confirmed' => 'Пароли не совпадают',
        ]);
    }


    /**
     * @param object $request
     * @return mixed
     */
    public static function login(object $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ],
        [
            'name.required' => 'Имя не может быть пустым',
            'name.string' => 'Имя пользователя должно быть строкой',
            'password.required' => 'Пароль не может быть пустым',
            'password.string' => 'Пароль должен быть строкой',
        ]);
    }
}
