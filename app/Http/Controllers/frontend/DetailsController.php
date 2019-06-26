<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Cart;

class DetailsController extends Controller
{
    public function detailProduct($id){

        $all_products=Product::where('id',$id)->first();
        //dd($all_products);
    	return view('frontend.details',compact('all_products'));
   }
    public function addToCart($id)
  {

    if(auth::user()){

     $product=Product::select('price')->where('id',$id)->first();

     $checkCart=Cart::where('product_id',$id)
     ->where('user_id',auth()->user()->id)->where('status','pending')->first();
     if($checkCart)
     {
      $new_qty=$checkCart->qunt+$request->input('qunt');
      Cart::where('id',$checkCart->id)
     ->update([
      'qunt'=>$new_qty,
      'sub_total'=>$new_qty*$product->price
    ]);
     
     }
    
     else{
       Cart::create([
        'product_id'=>$id,
        'unit_price'=>$product->price,
        'qunt'=>1,
        'sub_total'=>1*$product->price,
        'user_id'=>auth()->user()->id,
      ]);
     }


     $all_carts=Cart::where('product_id',$id)->get();
     return view ('frontend.cart',compact('all_carts'));
   }

  
}

    }
    

