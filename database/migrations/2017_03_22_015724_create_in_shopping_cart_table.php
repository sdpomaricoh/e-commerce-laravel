<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInShoppingCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('in_shopping_cart', function(Blueprint $table){
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('shopping_cart_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
			$table->foreign('shopping_cart_id')->references('id')->on('shoppingcart')->onDelete('cascade');
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
        Schema::dropIfExists('in_shopping_cart');
    }
}
