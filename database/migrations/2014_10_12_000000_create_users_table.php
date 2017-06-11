<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique()->nullable(false);
            $table->smallInteger('enabled');
            $table->string('first_name')->nullable(true);
            $table->string('last_name')->nullable(true);
            $table->string('username')->unique()->nullable(false);
            $table->text('password');
            $table->string('phone')->nullable(true);
            $table->smallInteger('default_payment_id')->nullable(true);
            $table->smallInteger('default_shipping_address_id')->nullable(true);
            $table->string('remember_token');
        });

        DB::table('users')->insert(
            array(
                'id' => 1,
                'email' => 'timi_monoki@yahoo.com',
                'enabled' => 1,
                'first_name' => 'Timea',
                'last_name' => 'Monoki',
                'username' => 'timi',
                'password' => '1234',
                'phone' => '0742663558',
                'remember_token' => '1'
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
        Schema::dropIfExists('users');
    }
}
