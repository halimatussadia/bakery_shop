<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    	
   protected $fillable=['product_id','unit_price','type','qunt','sub_total','details'];
     
     public function product_relation(){

     	return $this->hasOne(Product::Class,'id','product_id');
     }
   
}
