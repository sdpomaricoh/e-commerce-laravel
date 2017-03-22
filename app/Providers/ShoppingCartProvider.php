<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\ShoppingCart;

class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
			//views to load the shopping cart
			'layouts.app'
		],function($view){

			//get the shopping cart id on the session and instance a object ShoppingCart
			$shoppingCartId = \Session::get('$shopping_cart_id');
			$shoppingCart = ShoppingCart::findOrCreateBySessionId($shoppingCartId);

			//save the shopping cart on session
			\Session::put('$shopping_cart_id',$shoppingCart->id);

			//return the data in the view
			$view->with('shoppingCart', $shoppingCart);
		});
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
