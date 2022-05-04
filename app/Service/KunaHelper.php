<?php

namespace App\Service;


use App\Service\Contracts\PaymentInterface;
use App\Service\Entity\EasypayEntity;
use Illuminate\Support\Facades\Log;

class KunaHelper implements PaymentInterface
{
    private $number;
    private $balance;

    /**
     * номер хозяйского счета
     *
     * @param $number
     * @return void
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function connect()
    {

    }

    public function getToken()
    {

    }

    public function loginAuth()
    {

    }

    public function getWallets()
    {

    }

    public function send()
    {

    }

    public function isTransactionSuccess()
    {


        return true;
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;
    }
}
