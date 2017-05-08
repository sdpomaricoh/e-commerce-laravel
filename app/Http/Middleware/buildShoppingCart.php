<?php

namespace App\Http\Middleware;

use Closure;
use App\ShoppingCart;

class buildShoppingCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $shoppingCartId = \Session::get('$shopping_cart_id');
		$shoppingCart = ShoppingCart::findOrCreateBySessionId($shoppingCartId);
        $request->shoppingCart = $shoppingCart;
        return $next($request);
    }
}
