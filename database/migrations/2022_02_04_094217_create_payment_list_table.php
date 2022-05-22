<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_list', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('currency')->index();
            $table->double('commission',8,2)->default(0);
            $table->integer('percent')->default(0);
            $table->string('public_key')->nullable();
            $table->string('private_key')->nullable();
            $table->string('token')->nullable();
            $table->integer('limit')->default(0);
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
        Schema::dropIfExists('payment_list');
    }
}
