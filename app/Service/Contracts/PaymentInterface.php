<?php

namespace App\Service\Contracts;

interface PaymentInterface
{
    public function connect();
    public function getToken();
    public function loginAuth();
    public function getWallets();
    public function send();
    public function isTransactionSuccess();
    public function setNumber($number);
    public function setBalance($balance);
}
