<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Category;
use Carbon\Carbon;
use Image;



class ProductController extends Controller
{
    public function showProduct()
    {
      $categories=Category::get();

      $all_products=Product::with('category')->orderBy('id', 'desc')->get();;

      return view ('backend.product',compact('categories','all_products'));
    }

   public function productform(Request $request)
   {
       $request->validate([
    
        'type'=>'required',
        'price'=>'required|numeric',
        'weight'=>'required',
        'product_image'=>'required',
      ]);

     $imageName='';
     if($request->hasfile('product_image'))
     {
      $photo=$request->file('product_image');
      $imageName=uniqid('pImage_',true).str_random(10).'.'.$photo->getClientOriginalName();
      $photo->storeAs('product_image',$imageName);
      }
    
     Product::create([
          'product_name'=>$request->input('product_name'),
          'type'=>$request->input('type'),
          'price'=>$request->input('price'),
          'flavour'=>$request->input('flavour'),
          'weight'=>$request->input('weight'),
          'category_id'=>$request->input('category_id'),
          'product_image'=>$imageName,
     ]);
     session()->flash('message', 'Product Added Successfully!');
     // Product::create($data);
    return redirect()->back();
    }



   public function editProduct($id){
    $edit_product=Product::where('id',$id)->first();
    $categories=Category::get();


    return view('backend.editproduct',compact('categories','edit_product'));
   }



   public function updateProduct(Request $request, $id){

     
      $imageName='';
     if($request->hasfile('product_image'))
     {
      $photo=$request->file('product_image');
      $imageName=uniqid('pImage_',true).str_random(10).'.'.$photo->getClientOriginalName();
      $photo->storeAs('product_image',$imageName);
      }

    Product::where('id',$id)->update([
    'product_name'=>$request->input('product_name'),
          'type'=>$request->input('type'),
          'price'=>$request->input('price'),
          'flavour'=>$request->input('flavour'),
          'weight'=>$request->input('weight'),
          'category_id'=>$request->input('category_id'),
          'product_image'=>$imageName,
          'status'=>$request->input('status'),
     ]);
    
 return redirect('/admin/product')->with('message','Product Update Successfully');
   }
}
