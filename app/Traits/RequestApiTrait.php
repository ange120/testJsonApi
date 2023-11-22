<?php

namespace App\Traits;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Log;

trait RequestApiTrait
{
    /**
     * @param string $url
     * @return mixed
     */
    protected static function getJson(string $url): mixed
    {
        try {
            $client = new PendingRequest();
            $response = $client->get($url);
            return $response->json();
        }catch (\Exception $exception){
            Log::error('Error fetching data: ' . $exception->getMessage());
            return [];
        }
    }

}
