<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for($i=0; $i < 40;$i++){
            DB::table('users')->insert([
                'name' => "Василий {$i}",
                'email' => "test_{$i}@gmail.com",
                'password' => Hash::make('123456'),
            ]);
        }


    }
}
