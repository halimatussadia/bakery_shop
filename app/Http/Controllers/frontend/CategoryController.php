<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
    public function showcategory(){
    	$all_categories=Category::all();
      // dd($all_categories);
      return view ('frontend.category',compact('all_categories')); 
    }
}
