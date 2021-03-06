<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('street_number');
            $table->string('county');
            $table->string('zipcode');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });

        DB::table('shipping_address')->insert(
            array(
                'id' => 1,
                'name' => 'Monoki Timea',
                'country' => 'Romania',
                'city' => 'Reghin',
                'street' => 'Gurghiului',
                'street_number' => '33',
                'county' => 'Mures',
                'zipcode' => '545300',
                'user_id' => 1
            )
        );

        DB::table('shipping_address')->insert(
            array(
                'id' => 2,
                'name' => 'Monoki Timea',
                'country' => 'Romania',
                'city' => 'Aiud',
                'street' => 'Feleac',
                'street_number' => '55',
                'county' => 'Alba',
                'zipcode' => '330112',
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
        Schema::dropIfExists('shipping_address');
    }
}
