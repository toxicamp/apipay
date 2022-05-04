<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction', function (Blueprint $table) {
            $table->dropColumn('hash');
            $table->dropColumn('from');
            $table->dropColumn('to');
            $table->dropColumn('payment_name');

            $table->bigInteger('shop_id');
            $table->double('total', 8,8);
            $table->double('pay_commission',8,2)->default(0)->comment('комиссия платежной системы');
            $table->integer('pay_percent')->default(0)->comment('процент платежной системы');
            $table->integer('pay_limit')->default(0)->comment('лимит платежной системы');

            $table->double('serv_commission',8,2)->default(0)->comment('комиссия внутренней системы');
            $table->integer('serv_percent')->default(0)->comment('процент внутренней системы');
            $table->integer('serv_limit')->default(0)->comment('лимит внутренней системы');
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
