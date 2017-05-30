<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('street_number');
            $table->string('county');
            $table->string('zipcode');
            $table->unsignedInteger('user_id');
        });

        DB::table('billing_address')->insert(
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

        DB::table('billing_address')->insert(
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
        Schema::dropIfExists('billing_address');
    }
}
