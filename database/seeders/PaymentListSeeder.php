<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_list')->truncate();

        DB::table('payment_list')->insert([
            'name' => 'Easypay',
            'currency' => 'UAH',
        ]);
//        DB::table('payment_list')->insert([
//            'name' => 'Global24',
//            'currency' => 'UAH',
//        ]);
//        DB::table('payment_list')->insert([
//            'name' => 'Privat24',
//            'currency' => 'UAH',
//        ]);
//        DB::table('payment_list')->insert([
//            'name' => 'kuna',
//            'currency' => 'UAH',
//        ]);
//        DB::table('payment_list')->insert([
//            'name' => 'kuna',
//            'currency' => 'BTC',
//        ]);
//        DB::table('payment_list')->insert([
//            'name' => 'kuna',
//            'currency' => 'USDT',
//        ]);
//        DB::table('payment_list')->insert([
//            'name' => 'kuna',
//            'currency' => 'RUB',
//        ]);
//        DB::table('payment_list')->insert([
//            'name' => '4bill',
//            'currency' => 'UAH',
//        ]);
//        DB::table('payment_list')->insert([
//            'name' => '4bill',
//            'currency' => 'RUB',
//        ]);
//        DB::table('payment_list')->insert([
//            'name' => '4bill',
//            'currency' => 'BTC',
//        ]);
//        DB::table('payment_list')->insert([
//            'name' => '4bill',
//            'currency' => 'USDT',
//        ]);
        DB::table('payment_list')->insert([
            'name' => 'settlepay',
            'currency' => 'UAH',
        ]);
        DB::table('payment_list')->insert([
            'name' => 'settlepay',
            'currency' => 'USD',
        ]);
        DB::table('payment_list')->insert([
            'name' => 'settlepay',
            'currency' => 'EUR',
        ]);
        DB::table('payment_list')->insert([
            'name' => 'settlepay',
            'currency' => 'RUB',
        ]);
    }
}
