<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TripAdvisoerController extends Controller
{
    public function getReviews()
    {
        $client = new Client(); // Initialize Guzzle client
        
        $response = $client->request('GET', 'https://api.content.tripadvisor.com/api/v1/location/locationId/details?language=en&currency=USD&key=Pakistan', [
            'headers' => [
                'API-Key' => env('TRIPADVISOR_API_KEY'),
              'accept' => 'application/json',
            ],
          ]);
          
          echo $response->getBody();
        // $response = $client->request('GET', 'https://api.content.tripadvisor.com/api/v1/location/nearby_search?language=en', [
        //     'headers' => [
        //         'API-Key' => env('TRIPADVISOR_API_KEY'),
        //         // Add other necessary headers
        //         // 'accept' => 'application/json',
        //     ],
        //     // Add any other necessary options
        // ]);

        // return json_decode($response->getBody()->getContents());
    }
}
