<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
    public function home(){
		$frontpage = Product::where('frontpage','=','1')
							->orderBy('created_at','ASC')
							->paginate(6);

		return view('home',['frontpage'=>$frontpage]);
	}

	public function show($slug){
		$product = Product::where('slug','=',$slug)->get();
		dd($product);
	}
}
