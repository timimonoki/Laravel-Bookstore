<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->double('subtotal');
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('shopping_cart_id');
            $table->unsignedInteger('order_id')->nullable(true);
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts');
            $table->foreign('order_id')->references('id')->on('orders');
        });

        DB::table('cart_items')->insert(
            array(
                'id' => 1,
                'quantity' => 2,
                'subtotal' => 100,
                'book_id' => 1,
                'shopping_cart_id' => 1,
                'order_id' => 1
            )
        );

        DB::table('cart_items')->insert(
            array(
                'id' => 2,
                'quantity' => 1,
                'subtotal' => 89.9,
                'book_id' => 2,
                'shopping_cart_id' => 1,
                'order_id' => 1
            )
        );

        DB::table('cart_items')->insert(
            array(
                'id' => 3,
                'quantity' => 1,
                'subtotal' => 89.9,
                'book_id' => 2,
                'shopping_cart_id' => 1,
                'order_id' => 2
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
        Schema::dropIfExists('cart_items');
    }
}
