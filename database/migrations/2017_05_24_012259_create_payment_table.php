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
            $table->integer('cvc')->nullable(false);
            $table->string('expiry_month')->nullable(false);
            $table->string('expiry_year')->nullable(false);
            $table->string('holder_name');
            $table->unsignedInteger('billing_address_id');
            $table->unsignedInteger('user_id');
            $table->foreign('billing_address_id')->references('id')->on('billing_address');
            $table->foreign('user_id')->references('id')->on('users');
        });

        DB::table('payments')->insert(
            array(
                'id' => 1,
                'card_name' => 'Visa',
                'card_number' => '5430 0001 0002 0003',
                'cvc' => 111,
                'expiry_month' => '01',
                'expiry_year' => '2020',
                'holder_name' => 'Monoki Timea',
                'billing_address_id' => 1,
                'user_id' => 1
            )
        );

        DB::table('payments')->insert(
            array(
                'id' => 2,
                'card_name' => 'Master',
                'card_number' => '5430 1101 2222 3333',
                'cvc' => 111,
                'expiry_month' => '01',
                'expiry_year' => '2020',
                'holder_name' => 'Monoki Timea',
                'billing_address_id' => 1,
                'user_id' => 1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
