<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
	use Sluggable;

	protected $table = "products";
	protected $fillable = ['uuid','category_id','name','size','pricing','description','slug'];

	public function category(){
		return $this->belongsTo('App\CategoryProduct');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function images(){
		return $this->hasMany('App\ProductImage');
	}

	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(){
		return [
            'slug' => [
                'source' => 'name'
            ]
        ];
	}

	/**
	 * [Set a product with format of paypal]
	 * @return [Method] [Define the characteristics of a product for paypal]
	 */
	public function PayPalItem() {
		return PaypalPayment::item()->setName($this->name)
									->setDescription($this->description)
									->setCurrency('USD')
									->setQuantity(1)
									->setPrice($this->pricing);
	}
}
