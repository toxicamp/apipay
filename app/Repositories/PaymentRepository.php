<?php

namespace App\Repositories;

use App\Models\Payment;
use Carbon\Carbon;

class PaymentRepository
{


    public function save(array $array): string
    {

        $hash = $this->getHash($array['user_id']);

        $result = (bool)Payment::query()->updateOrInsert(
            [
                'hash' => $hash,
                'user_id' => $array['user_id'],


            ],
            [


                'hash' => $hash,
                'amount' => $array['amount'],
                'user_id' => $array['user_id'],
                Payment::CREATED_AT => Carbon::now(),
                Payment::UPDATED_AT => Carbon::now(),

            ]
        );

        return $hash;
    }

    public function update($hash, array $params): bool
    {
        return (bool)Payment::query()->where(
            [
                'hash' => $hash,

            ])->update($params);
    }

    public function findByHash(array $data)
    {
        return Payment::query()->where([
            'user_id' => $data['user_id'],
            'hash' => $data['hash'],
        ])->first();
    }

    private function getHash($data)
    {
        return md5($data . time());
    }


}
