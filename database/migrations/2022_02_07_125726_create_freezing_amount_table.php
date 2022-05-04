<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreezingAmountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freezing_amount', function (Blueprint $table) {
            $table->id();
            $table->double('amount', 20, 10)->default(0.0);
            $table->bigInteger('user_id');
            $table->bigInteger('transaction_id');
            $table->bigInteger('payment_id');
            $table->string('currency');
            $table->bigInteger('pay_id');
            $table->enum('status', ['other', 'error', 'blocking', 'process', 'success']);
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
        Schema::dropIfExists('freezing_amount');
    }
}
