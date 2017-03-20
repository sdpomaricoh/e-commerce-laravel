<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = "categories_products";
	protected $fillable = ['name','description'];

	public function products(){
		return $this->hasMany('App\Product');
	}
}
