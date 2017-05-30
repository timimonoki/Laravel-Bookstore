<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('order_date');
            $table->string('order_status');
            $table->double('order_total');
            $table->dateTime('shipping_date');
            $table->string('shipping_method');
            $table->unsignedInteger('shipping_address_id');
            $table->unsignedInteger('billing_address_id');
            $table->unsignedInteger('payment_id');
            $table->unsignedInteger('user_id');
        });

        DB::table('orders')->insert(
            array(
                'id' => 1,
                'order_date' => '2017.05.20',
                'order_status' => 'delivered',
                'order_total' => 189.9,
                'shipping_date' => '2017.05.22',
                'shipping_method' => 'car',
                'shipping_address_id' => 1,
                'billing_address_id' => 1,
                'payment_id' => 1,
                'user_id' => 1
            )
        );

        DB::table('orders')->insert(
            array(
                'id' => 2,
                'order_date' => '2017.05.20',
                'order_status' => 'on the way',
                'order_total' => 95.9,
                'shipping_date' => '2017.05.22',
                'shipping_method' => 'car',
                'shipping_address_id' => 1,
                'billing_address_id' => 1,
                'payment_id' => 1,
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
        Schema::dropIfExists('orders');
    }
}
