<?php

namespace Payments\Contract;


interface RequestInterface
{
    /**
     * @return array
     */
    public function getTransactionData();

    /**
     * @return string
     */
    public function getTransactionType();

    /**
     * @return EndpointInterface
     */
    public function getEndpoint();

    /**
     * @param EndpointInterface $endpoint
     */
    public function setEndpoint(EndpointInterface $endpoint);

    /**
     * @param array $data
     * @return ResponseInterface
     */
    public function getResponse(array $data);
}
