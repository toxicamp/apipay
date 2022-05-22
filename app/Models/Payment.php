<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'delete_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function truncateByUserId($userId)
    {
      return DB::table('payments')->where('user_id', $userId)->delete();
    }

    public function saveWallets($wallets, $userId)
    {
        DB::table('payments')->where('user_id', $userId)->delete();
        $data = [];
        $i=0;
        foreach ($wallets as $wallet)
        {
            if ($i<8) {
                $wallet['easypay_id'] = $wallet['id'];
                unset($wallet['id']);
                $wallet['amount'] = $wallet['balance'];
                $wallet['status'] = 1;
                $wallet['user_id'] = $userId;
                $wallet['hash'] = Hash::make((string)$wallet['easypay_id'] . (string)$wallet['instrumentId'] . $wallet['name']);
                $wallet['properties'] = json_encode($wallet['properties']);



                $data[] = $wallet;
            }
            $i++;

        }

        DB::table('payments')->insert($data);
    }
}

