<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use App\CategoryProduct;

class ProductsController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$products = Product::all();
        return view('products.index',["products"=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = CategoryProduct::all();
		$product =  new Product();
		return view('products.create',['categories'=>$categories,'product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data = $request->all();
		$categories = CategoryProduct::all();
		$product = new Product($data);
		$product->uuid = Uuid::generate(4);
		$product->user_id = Auth::user()->id;

		if($product->save()){
			return redirect('/products');
		}else{
			return view('products.create',['categories'=>$categories,'product'=>$product]);
		}

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =  Product::find($id);
		return view('products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$categories = CategoryProduct::all();
		$product =  Product::find($id);
		return view('products.edit',['categories'=>$categories,'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$product =  Product::find($id);
		$categories = CategoryProduct::all();

		$product->name = $request->name;
		$product->pricing = $request->pricing;
		$product->size = $request->size;
		$product->category_id = $request->category_id;
		$product->description = $request->description;

		if($product->save()){
			return redirect('/products');
		}else{
			return view('products.edit',['categories'=>$categories,'product'=>$product]);
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
		$product =  Product::destroy($id);
		return redirect('/products');
    }
}
