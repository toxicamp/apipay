<?php

namespace Payments\Endpoint;

use Payments\Contract\EndpointInterface;

class ApiSettlepayEndpoint implements EndpointInterface
{
    public function getUrl()
    {
        return 'https://api.settlepay.net';
    }

    public function getMethod()
    {
        return 'POST';
    }
}
