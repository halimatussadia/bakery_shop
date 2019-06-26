<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Carbon\Carbon;
use Image;

class CategoryController extends Controller
{
    public function showCategories(){

      $all_categories=Category::orderBy('id','desc')->get();

      return view ('backend.categories',compact('all_categories'));
    }


    public function categoryform(Request $request){ 
      //dd($request->all());

      $request->validate([
        'name'=>'required|max:50',
        'description'=>'required',
        'image'=>'required',
      ]);



     $img='';
     if($request->hasfile('image'))
     {
     $image=$request->file('image');
     $img=uniqid('pImage_',true).str_random(10).'.'.$image->getClientOriginalName();
     $image->storeAs('category_image',$img);
      }


      Category::create([
       
        'name'=>$request->input('name'),
        'description'=>$request->input('description'),
        'image'=>$img,
      ]);
     
      session()->flash('message','Product Category Added Successfully!');
      return redirect()->back();
    }



    public function editCategory($id){ 
    $edit=Category::where('id',$id)->first();
    return view('backend.editcategory',compact('edit'));
    }



    public function postCategory(Request $request,$id ){

     $img='';
     if($request->hasfile('image')){
     $image=$request->file('image');
     $img=uniqid('pImage_',true).str_random(10).'.'.$image->getClientOriginalName();
     $image->storeAs('category_image',$img);
   }
      Category::where('id',$id)->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'image'=> $img,
            'status'=>$request->input('status'),
        ]);



      return redirect('/admin/categories')->with('message','Category Update Successfully');
    }
}
