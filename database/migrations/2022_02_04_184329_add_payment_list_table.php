<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_list', function (Blueprint $table) {

            $table->double('serv_commission',8,2)->default(0);
            $table->integer('serv_percent')->default(0);
            $table->integer('serv_limit')->default(0);
            $table->string('action')->nullable();
            $table->string('params')->nullable();
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
