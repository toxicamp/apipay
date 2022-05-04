<?php

namespace Payments\Exception;

use Payments\Domain\Reason;

class ApiException extends PaymentsException
{
    public function __construct(Reason $reason)
    {
        parent::__construct($reason->getMessage(), $reason->getCode());
    }
}
