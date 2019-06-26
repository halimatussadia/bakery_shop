<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
     public function showOrders()
     {
     	$all_orders=Order::with('user')->orderBy('id', 'desc')->get();
     	return view('backend.order',compact('all_orders'));
    } 
    public function deleteOrders($id){
        DB::table('orders')->where('id',$id)->delete();
        return redirect()->back();
    }
    public function completeOrder($id){
        $order=Order::find($id);
        if($order->is_completed){
            $order->is_completed = 0;
        }
        else{
            $order->is_completed = 1;
        }
        $order->save();
    return redirect()->back()->with('message','Order Completed Successfully');

        return back();
    }
    public function paid($id){
        $order=Order::find($id);
        if($order->paid){
            $order->paid = 0;
        }
        else{
            $order->paid = 1;
        }
        $order->save();
        return back();
    }
}
