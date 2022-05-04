<?php

namespace Payments\Endpoint;

use Payments\Contract\EndpointInterface;

class ApiEasypayEndpoint implements EndpointInterface
{
    public function getUrl()
    {
        return 'https://merchantapi.easypay.ua';
    }

    public function getMethod()
    {
        return 'POST';
    }
}
