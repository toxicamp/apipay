<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('hash')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->double('amount',8, 2)->default(0.0);
            $table->enum('status',['process', 'fail', 'block', 'success']);
            $table->enum('payment_name',['easypay', '4bil', 'kuna']);
            $table->enum('currency',['UAH', 'RUB', 'BTC','USDT']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
