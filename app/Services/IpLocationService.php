<?php

namespace App\Services;

use GuzzleHttp\Client;

class IpLocationService
{
    public function getLocation($ip)
    {
        $client = new Client();
        $response = $client->get("http://ip-api.com/json/{$ip}");
        return json_decode($response->getBody()->getContents(), true);
    }
}
