<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersTableStatistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->double('kuna',8,2)->default(0);
            $table->double('easypay',8,2)->default(0);
            $table->double('4bil',8,2)->default(0);
            $table->double('global',8,2)->default(0);
            $table->decimal('BTC',$precision = 8, $scale = 2);
            $table->double('RUB',8,2)->default(0);
            $table->double('UAH',8,2)->default(0);
            $table->double('USDT',8,2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
