<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            
             $table->string('name');
             $table->string('author');
             $table->text('description')->nullable();
             $table->float('price',6,3);
             $table->float('price_purchase',6,3);
             $table->integer('num_pages');
             $table->bigInteger('isbn');
             $table->integer('quantity');
             $table->integer('discount')->default(0)->nullable();

             
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->bigInteger('editorial_id')->unsigned()->nullable();
            $table->foreign('editorial_id')->references('id')->on('editorials');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
