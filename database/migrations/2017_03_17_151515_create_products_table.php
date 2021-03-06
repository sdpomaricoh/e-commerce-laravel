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
		Schema::create('products', function(Blueprint $table){
			$table->increments('id');
			$table->uuid('uuid');
			$table->integer('user_id')->unsigned();
			$table->integer('category_id')->unsigned();
            $table->string('name',100);
			$table->string('size');
			$table->decimal('pricing',9,2);
			$table->text('description');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('category_id')->references('id')->on('categories_products')->onDelete('cascade');
			$table->tinyInteger('frontpage');
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
