<?php

namespace Payments\Contract;


interface EndpointInterface
{
    /**
     * @return string
     */
    public function getUrl();

    /**
     * @return string
     */
    public function getMethod();
}
