<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

class ProfileController extends Controller
{
    public function profileform(){
         
         $user_info=User::where('id',auth()->user()->id)->first();
         // dd($user_info);
    	return view ('frontend.profile',compact('user_info'));
    }
    public function editprofile($id){
    	$edit_profile=User::where('id',$id)->first();
    	return view('frontend.editprofile',compact('edit_profile'));
    }
    public function updateprofile(Request $request,$id){
      $edit_profile=User::find($id);	
      $edit_profile->name=$request->name; 
      $edit_profile->email=$request->email;
      $edit_profile->district=$request->district;
      $edit_profile->address=$request->address;
      $edit_profile->number=$request->number;
      $edit_profile->save();
      return redirect('/profile');
    }
}
