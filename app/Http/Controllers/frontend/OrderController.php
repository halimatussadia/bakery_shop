<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Cart;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class OrderController extends Controller
{
     public function showOrder(){
     	$cart_info=Cart::with('hasProducts')->where('user_id',auth()->user()->id)->where('status','pending')->get();
     	//dd($cart_info);
    return view ('frontend.order',compact('cart_info'));

    }

    public function doOrder(Request $request){

		$cart_info=Cart::with('hasProducts')->where('user_id',auth()->user()->id)->where('status','pending')->get();

		$total = $cart_info->sum('sub_total');
		
		
    $orderNo='OR_ID-'.date('YmdHis',strtotime(Carbon::now()));
		$order = Order::create([
			'user_id' =>auth()->user()->id,
			'order_no'=> $orderNo,
			'total' =>$total,
			'date' =>$request->input('date'),
			'time' =>$request->input('time'),
			'payment' =>$request->input('payment'),
			'delivery' =>$request->input('delivery')
		]);

		foreach ($cart_info as $product) {
			//dd($product);
			$order->orderDetails()->create([
				'product_id'=> $product->product_id,
				'unit_price'=> $product->unit_price,
				'sub_total' => $product->sub_total,
				'qunt'      => $product->qunt,
				'type'      =>$product->type,
		        'details'   =>$product->details,
			]);

		}
		Cart::where('user_id',auth()->user()->id)->where('status','pending')->delete();
        session()->flash('message','Thank you for order!');
    	return redirect()->back(); 
    }
    // public function deleteOrder($id){
    // 	DB::table('carts')->where('id',$id)->delete();
    // 	return redirect()->back();
    // }

}
