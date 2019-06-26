<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable=['user_id','total','date','time','payment','delivery','is_completed','order_no'];

    public function orderDetails()
    {
    	return $this->hasMany(Orderdetail::class);
    }
    public function user(){
    	return $this->hasOne(User::Class,'id','user_id');
    }
}
