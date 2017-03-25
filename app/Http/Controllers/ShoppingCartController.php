<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//get the shopping cart id on the session and instance a object ShoppingCart
		$shoppingCartId = \Session::get('$shopping_cart_id');
		$shoppingCart = ShoppingCart::findOrCreateBySessionId($shoppingCartId);

		$products = $shoppingCart->products()->get();
		$total = $shoppingCart->total();

		return view('checkout.show',['products'=>$products,'total'=>$total]);
    }
}