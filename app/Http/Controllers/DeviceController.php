<?php

namespace App\Http\Controllers;


class DeviceController extends Controller
{


    public function temperature()
    {
        $json = file_get_contents(base_path('devices.json'));

        $jsonDecode = json_decode($json, true);

        return response($jsonDecode['temperature'], 200);
    }
}
