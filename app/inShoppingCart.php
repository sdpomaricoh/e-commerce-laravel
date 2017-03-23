<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inShoppingCart extends Model
{
	protected $table = "in_shopping_cart";
	protected $fillable =['shopping_cart_id','product_id'];
}
