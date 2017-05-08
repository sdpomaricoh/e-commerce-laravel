<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayPal;
use App\ShoppingCart;
use App\Order;

class PaymentController extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('ShoppingCart');
	}

	public function store(Request $request){

		$shoppingCart = $request->shoppingCart;

		$paypal = new PayPal($shoppingCart);
		$response = $paypal->execute($request->paymentId,$request->PayerID);

		if ($response->state == "approved") {
			$order = Order::createFromPayPalResponse($response,$shoppingCart);
			$shoppingCart->approved();
		}

		return view('checkout.completed',['shoppingCart'=>$shoppingCart,'order'=>$order]);
	}


	public function show($id){
		$shoppingCart = ShoppingCart::where('custom_id',$id)->first();
		$order = $shoppingCart->order();
		return view('checkout.completed',['shoppingCart'=>$shoppingCart,'order'=>$order]);
	}
}
