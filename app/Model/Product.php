<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable=['product_name','type','price','category_id','flavour','weight','product_image'];

	public function category()
	{
		return $this-> hasOne(Category::Class,'id','category_id');
	}
}
