<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class ShoppingCart extends Model
{

	protected $table = "shoppingcart";

	protected $fillable = ['status','custom_id'];

	public function inShoppingCart(){
		return $this->hasMany('App\inShoppingCart');
	}

	public function products(){
		return $this->belongsToMany('App\Product','in_shopping_cart');
	}

	public function order(){
		return $this->hasOne('App\Order')->first();
	}

	public function productSizes(){
		return $this->products()->count();
	}

	public function total(){
		return $this->products()->sum('pricing');
	}

	/**
	 * [generateCustomID generate universal unique identifier]
	 * @return [String] [custom_id]
	 */
	public function generateCustomID(){
		return Uuid::generate(4);
	}

	/**
	 * [updateCustomIDAndStatus update custom_id and status of shopping cart]
	 */
	public function updateCustomIDAndStatus(){
		$this->custom_id = $this->generateCustomID();
		$this->status    = "approved";
		$this->save();
	}

	public function approved(){
		$this->updateCustomIDAndStatus();
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
