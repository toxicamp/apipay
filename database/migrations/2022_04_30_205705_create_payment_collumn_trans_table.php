<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCollumnTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_form_url', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->double('sum', 8,2)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('url')->nullable();
            $table->enum('payment', ['easypay','settlepay'])->default('settlepay');
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
        Schema::dropIfExists('payment_collumn_trans');
    }
}
