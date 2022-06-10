<?php

namespace Payments\Facades;

use Illuminate\Support\Facades\Facade;
use Payments\Payments;

class PaymentsFacad extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Payments::class;
    }
}
