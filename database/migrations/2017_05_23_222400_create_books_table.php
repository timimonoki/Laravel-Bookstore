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
            $table->string('title')->nullable(false);
            $table->string('author')->nullable(false);
            $table->string('category')->nullable(false);
            $table->text('description');
            $table->string('format');
            $table->integer('in_stock_number')->nullable(false);
            $table->string('language');
            $table->double('list_price', 15, 8)->nullable(false);
            $table->integer('number_of_pages');
            $table->double('our_price', 15, 8)->nullable(false);
            $table->dateTime('publication_date');
            $table->string('publisher');
            $table->double('shipping_weight', 15, 8);
        });

        DB::table('books')->insert(
            array(
                'id' => 1,
                'title' => 'Harry Potter',
                'author' => 'J.K.Rowling',
                'category' => 'SF',
                'description' => 'Magic',
                'format' => 'text',
                'in_stock_number' => 35,
                'language' => 'EN',
                'list_price' => 55,
                'number_of_pages' => 650,
                'our_price' => 50,
                'publication_date' => '2010.03.01',
                'publisher' => 'Publisher',
                'shipping_weight' => 250
            )
        );

        DB::table('books')->insert(
            array(
                'id' => 2,
                'title' => '50 Shades of black',
                'author' => 'Selena Sarns',
                'category' => 'Drama',
                'description' => 'Love',
                'format' => 'text',
                'in_stock_number' => 35,
                'language' => 'EN',
                'list_price' => 99.9,
                'number_of_pages' => 650,
                'our_price' => 89.9,
                'publication_date' => '2010.03.01',
                'publisher' => 'Publisher',
                'shipping_weight' => 250
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
        Schema::dropIfExists('books');
    }
}
