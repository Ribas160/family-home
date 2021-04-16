<?php

namespace App\Http\Controllers;


class DeviceController extends Controller
{


    public function temperature()
    {
        $json = file_get_contents(base_path('devices.json'));

        $jsonDecode = json_decode($json, true);

        return response($jsonDecode['dht11']['temperature'], 200);
    }


    public function humidity()
    {
        $json = file_get_contents(base_path('devices.json'));

        $jsonDecode = json_decode($json, true);

        return response($jsonDecode['dht11']['humidity'], 200);
    }
}
