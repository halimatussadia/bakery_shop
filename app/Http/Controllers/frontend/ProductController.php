<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Cartfccc;
use App\Http\Controllers\Controller;
use App\Model\User;


class ProductController extends Controller

{
   public function UserPanel(){
      return view ('frontend.interface');
    }

     public function registerForm(){

      return view ('frontend.registration');
    }

    public function showProduct(){

      $all_products=Product::all();
      //dd($all_products);
      return view ('frontend.product',compact('all_products')); 
    }

    public function categoryWiseProduct($id)
    {
      $all_products=Product::where('category_id',$id)->get();
      //dd($all_products);
      return view ('frontend.product',compact('all_products')); 
    }
    public function productcustomize($id){
      $all_products=Product::where('id',$id)->first();
      return view ('frontend.customizeproduct',compact('all_products'));
    }
}    