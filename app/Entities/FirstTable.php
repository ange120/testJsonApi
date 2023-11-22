<?php

namespace App\Entities;

use App\Interfaces\InputDataInterface;
use App\Traits\RequestApiTrait;

class FirstTable implements InputDataInterface
{
    use RequestApiTrait;

    public function getData()
    {
        return self::getJson(config('api_url.url_endpoint_1'));

    }
}
