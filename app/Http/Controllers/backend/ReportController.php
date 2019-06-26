<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Orderdetail;

class ReportController extends Controller
{
    public function reportgenerate()
    {
    	$data=[];
       if(!empty($_GET['from_date']))
      {
         $fromDate=$_GET['from_date'];
         $toDate=$_GET['to_date'];
         $data=Orderdetail::whereBetween('created_at',[ $fromDate,$toDate])->with('product_relation')->get();
         // dd($data);
      return view('backend.report',compact('data'));
      }
      return view('backend.report',compact('data'));
      //dd($data);
    	
    }

}
