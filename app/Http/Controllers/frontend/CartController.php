<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
  public function showCart(){
    $all_carts=Cart::with('hasProducts')->where('user_id',auth()->user()->id)->get();
      // dd($all_carts);
    return view ('frontend.cart',compact('all_carts'));
  }




  public function addToCart($id,$type)
  {
 
    if(auth::user()){

     $product=Product::select('price')->where('id',$id)->first();

     $checkCart=Cart::where('product_id',$id)
     ->where('user_id',auth()->user()->id)->where('status','pending')->first();

     if($checkCart)
     {
      $new_qty=$checkCart->qunt+1;
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
        'type'=>$type,
        'sub_total'=>1*$product->price,
        'user_id'=>auth()->user()->id,
      ]);
     }


     $all_carts=Cart::where('product_id',$id)->get();
     return view ('frontend.cart',compact('all_carts'));
   }
}



  public function customizeAddToCart(Request $request,$id)
  {

//dd(json_encode($request->input('details')));
    if(auth::user()){

     $product=Product::select('price')->where('id',$id)->first();

     $checkCart=Cart::where('product_id',$id)
     ->where('user_id',auth()->user()->id)->where('status','pending')->first();
     if($checkCart)
     {
      $new_qty=$checkCart->qunt+1;
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
        'type'=>'customize',
        'sub_total'=>1*$product->price,
        'user_id'=>auth()->user()->id,
        'details'=>json_encode($request->input('details')),
      ]);
     }


     $all_carts=Cart::where('product_id',$id)->get();
     return view ('frontend.cart',compact('all_carts'));
   }
  
}

// public function updateCart(Request $request, $id){
 
//   $cart =Cart::find($id);
//   if(!is_null($cart)){
//     $cart->product_quantity = $request->product_quantity;

//     $cart->save();
//   }
//   else {
//     // session()->flash('message', 'Cart item has updated successfully !!');
//     return redirect()->route('cart.add');
//   }
  
  

//}
  public function deleteCart($id){
  DB::table('carts')->where('id',$id)->delete();
 return redirect()->back();
 }

}

