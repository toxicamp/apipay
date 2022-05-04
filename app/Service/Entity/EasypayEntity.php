<?php

namespace App\Service\Entity;

class EasypayEntity
{
    private $apiAddress;
    private $url;
    private $headers;
    private $fields;
    private $params;
    private $method = 'POST';

    public function __construct(
        $url,
        array $headers = [],
        array $fields = [],
        array $customCurlParams = [],
        $method = 'POST')
    {
        $this->apiAddress = config('easypay.url');
        $this->setUrl($url);
        $this->setHeaders($headers);
        $this->setFields($fields);
        $this->setParams($customCurlParams);
        $this->setMethod($method);
    }


    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->apiAddress.$this->url;
    }

    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function setParams($params)
    {
        $this->params = $params;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        return $this->method;
    }
}
