<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\User;




class OrderdetailController extends Controller
{
    public function showdetails($id)
    {
    
    $all_details=Order::with('user')->with('orderDetails')->with(['orderDetails.product_relation'])->find($id);	
     //dd($all_details->user);
    return view('backend.order_details',compact('all_details'));
   }
}
