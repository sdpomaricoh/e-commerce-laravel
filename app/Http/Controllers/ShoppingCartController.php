<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\PayPal;

class ShoppingCartController extends Controller
{

	public function view()
    {
		$shoppingCart = $this->getShoppingCartBySession();
		$products = $shoppingCart->products()->get();
		$total = $shoppingCart->total();
		$productSizes = $shoppingCart->productSizes();
		return view('checkout.show',['products'=>$products,'total'=>$total,'productSizes'=>$productSizes]);
    }

	public function payment(){
		$shoppingCart = $this->getShoppingCartBySession();
		$paypal = new PayPal($shoppingCart);
		$payment = $paypal->generate();
		return redirect($payment->getApprovalLink());
	}

	public function getShoppingCartBySession(){
		//get the shopping cart id on the session and instance a object ShoppingCart
		$shoppingCartId = \Session::get('$shopping_cart_id');
		$shoppingCart = ShoppingCart::findOrCreateBySessionId($shoppingCartId);
		return $shoppingCart ;
	}
}
