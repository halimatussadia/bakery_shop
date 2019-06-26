<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
    protected $fillable=['product_id','type','unit_price','qunt','sub_total','user_id','status','details'];
    public function hasProducts(){

    	return $this->hasOne(Product::Class,'id','product_id');
    }
}
