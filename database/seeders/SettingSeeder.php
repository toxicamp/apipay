<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();

        DB::table('settings')->insert([
            'key' => 'commission',
            'value' => '0',
        ]);

        DB::table('settings')->insert([
            'key' => 'percent',
            'value' => '0',
        ]);

        DB::table('settings')->insert([
            'key' => 'limit',
            'value' => '0',
        ]);
    }
}
