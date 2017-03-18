<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Product extends Model
{

	protected $table = "products";
	protected $fillable = ['uuid','category_id','name','size','pricing','description'];

	public function category(){
		return $this->belongsTo('App\CategoryProduct');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function images(){
		return $this->hasMany('App\ProductImage');
	}
}
