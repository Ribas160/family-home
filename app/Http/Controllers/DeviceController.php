<?php

namespace App\Http\Controllers;


class DeviceController extends Controller
{


    public function temperature()
    {
        $arr = [
            'temperature' => [
                'c' => 30,
                'f' => 73,
            ],
        ];

        $encodeArr = json_encode($arr);
        file_put_contents(base_path('devices.json'), $encodeArr);

        $json = file_get_contents(base_path('devices.json'));
        $jsonDecode = json_decode($json, true);

        return response($jsonDecode['temperature'], 200);
    }
}
