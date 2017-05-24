<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable(false)->change();
            $table->string('author')->nullable(false)->change();
            $table->string('category')->nullable(false)->change();
            $table->text('description');
            $table->string('format');
            $table->integer('in_stock_number')->nullable(false)->change();
            $table->string('language');
            $table->double('list_price', 15, 8)->nullable(false)->change();
            $table->integer('number_of_pages');
            $table->double('our_price', 15, 8)->nullable(false)->change();
            $table->string('publication_date');
            $table->string('publisher');
            $table->double('shipping_weight', 15, 8);
            $table->smallInteger('acive')->nullable(false)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
