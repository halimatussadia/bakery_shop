<?php


namespace App\Http\Controllers\backend;


use App\Model\Payment;

class PaymentController
{
     public function index($id){
         $payments = Payment::where('id',$id)->get();
         return view('backend.payment',compact('payments'));
     }


}
