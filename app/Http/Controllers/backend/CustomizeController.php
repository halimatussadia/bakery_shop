<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Orderdetail;

class CustomizeController extends Controller
{
   public function customize($id){
   	
   $customize=Orderdetail::where('id',$id)->with('product_relation')->get();	
  // dd($customize);
    return view('backend.customize',compact('customize'));
   }
}
