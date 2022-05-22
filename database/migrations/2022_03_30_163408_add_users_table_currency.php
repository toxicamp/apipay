<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersTableCurrency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_currency', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('kuna',8,2)->default(0);
            $table->double('easypay',8,2)->default(0);
            $table->double('4bil',8,2)->default(0);
            $table->double('global',8,2)->default(0);
            $table->double('BTC',8,2)->default(0);
            $table->double('RUB',8,2)->default(0);
            $table->double('UAH',8,2)->default(0);
            $table->double('USDT',8,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_table_currency');
    }
}
