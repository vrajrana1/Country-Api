<?php
require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

function getCountryData($country)
{
    $client = new Client();
    $response = $client->request('GET', 'https://restcountries.com/v2/name/' . $country);
    $data = json_decode($response->getBody(), true);

    return [
        'name' => $data[0]['name'],
        'capital' => $data[0]['capital'],
        'population' => $data[0]['population'],
        'region' => $data[0]['region'],
        'subregion' => $data[0]['subregion'],
        'area' => $data[0]['area'],
        'languages' => array_column($data[0]['languages'], 'name'),
        'flag' => $data[0]['flag']
    ];
}

return getCountryData($_POST['country']);
