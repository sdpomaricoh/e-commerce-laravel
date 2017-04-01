<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = "orders";
	protected $fillable = ['shoppingcart_id','line1','line2','city','postal_code','state','recipient_name','email','status','guide_number','total','country_code'];

	public static function createFromPayPalResponse($response,$shoppingCart){
		$payer = $response->payer;
		$orderData = (array) $payer->payer_info->shipping_address;
		$orderData = $orderData[key($orderData)];
		$orderData['email'] = $payer->payer_info->email;
		$orderData['total'] = $shoppingCart->total();
		$orderData['shoppingcart_id'] = $shoppingCart->id;

		return Order::create($orderData);
	}

	public function address(){
		return "$this->line1 $this->line2";
	}

	public static function totalMonth(){
		return Order::monthly()->sum('total');
	}

	public static function totalMonthCount(){
		return Order::monthly()->count();
	}

	public function scopeLastest($query){
		return $query->orderID()->monthly();
	}

	public function scopeOrderID($query){
		return $query->orderBy('id','desc');
	}

	public function scopeMonthly($query){
		return $query->whereMonth('created_at', '=', date('m'));
	}

}
