<?php

namespace Payments\Contract;


interface RequestTransformerInterface
{
    /**
     * @param RequestInterface $transactionRequest
     * @return ResponseInterface
     */
    public function transform(RequestInterface $transactionRequest);
}
