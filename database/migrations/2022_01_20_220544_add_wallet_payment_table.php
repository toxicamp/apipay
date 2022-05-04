<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWalletPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {

           $table->bigInteger('easypay_id')->nullable();
           $table->bigInteger('instrumentId')->nullable();
           $table->string('activateCodeType')->nullable();
           $table->string('name')->nullable();
           $table->string('number')->nullable();
           $table->string('walletType')->nullable();
           $table->double('balance',8, 2)->nullable();
           $table->double('pendingBalance', 8, 2)->nullable();
           $table->double('limit', 8, 2)->nullable();
           $table->string('lastOperationDate')->nullable();
           $table->text('properties')->nullable();
           $table->integer('priorityIndex')->nullable();
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
