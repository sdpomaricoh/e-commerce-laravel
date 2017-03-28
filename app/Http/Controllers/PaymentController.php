<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayPal;
use App\ShoppingCart;

class PaymentController extends Controller
{
	public function store(Request $request){

		$shoppingCartId = \Session::get('$shopping_cart_id');
		$shoppingCart = ShoppingCart::findOrCreateBySessionId($shoppingCartId);

		$paypal = new PayPal($shoppingCart);
		dd($paypal->execute($request->paymentId,$request->PayerID));
	}
}
