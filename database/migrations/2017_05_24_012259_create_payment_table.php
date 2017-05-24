<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_name');
            $table->string('card_number');
            $table->integer('cvc')->nullable(false)->change();
            $table->integer('expiry_month')->nullable(false)->change();
            $table->integer('expiry_year')->nullable(false)->change();
            $table->string('holder_name');
            $table->unsignedInteger('user_id');

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
