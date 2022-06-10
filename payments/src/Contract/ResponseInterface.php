<?php

namespace Payments\Contract;


use Payments\Domain\Reason;

interface ResponseInterface
{
    /**
     * @return Reason
     */
    public function getReason();
}
