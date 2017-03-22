<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{

	protected $table = "shoppingcart";

	protected $fillable = ['status'];

	public function inShoppingCart(){
		return $this->hasMany('App\inShoppingCart');
	}

	public function products(){
		return $this->belongsToMany('App\Product','in_shopping_cart');
	}

	public function productSizes(){
		return $this->products()->count();
	}

	/**
	 * [findOrCreateBySessionId Search or create a shopping cart according to the case]
	 * @param  [integer] $shoppingcart_id [id of shopping cart]
	 * @return [Method] findBySession or creteWithoutSession
	 */
	public static function findOrCreateBySessionId($shoppingcart_id){
		if ($shoppingcart_id) {
			return ShoppingCart::findBySession($shoppingcart_id);
		}else{
			return ShoppingCart::creteWithoutSession();
		}
	}

	/**
	 * [findBySession Find a shopping cart that already exists ]
	 * @param  [integer] $shoppingcart_id [id of shopping cart]
	 * @return [Object] $shoppingCart [shopping cart found]
	 */
	public static function findBySession($shoppingcart_id){
		return ShoppingCart::find($shoppingcart_id);
	}

	/**
	 * [creteWithoutSession create shopping cart when no exists ]
	 * @return [Object] $shoppingCart [new shopping cart]
	 */
	public static function creteWithoutSession(){
		return ShoppingCart::create(['status'=>'incompleted']);
	}

}
