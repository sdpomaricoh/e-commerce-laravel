<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\inShoppingCart;

class inShoppingCartController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//get the shopping cart id on the session and instance a object ShoppingCart
		$shoppingCartId = \Session::get('$shopping_cart_id');
		$shoppingCart = ShoppingCart::findOrCreateBySessionId($shoppingCartId);
		$response = inShoppingCart::create([
			'shopping_cart_id' => $shoppingCart->id,
			'product_id' => $request->product_id
		]);

		if($response){
			return redirect('/checkout');
		}else{
			return back();
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
