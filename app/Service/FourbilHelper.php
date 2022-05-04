<?php

namespace App\Service;


use App\Service\Contracts\PaymentInterface;
use App\Service\Entity\EasypayEntity;
use Illuminate\Support\Facades\Log;

class FourbilHelper implements PaymentInterface
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

    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    public function isTransactionSuccess()
    {
        //здесь нужно написать логику проверки прошла ли транзакция

        return true;
    }
}
