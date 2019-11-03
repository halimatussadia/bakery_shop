<?php

namespace App\Http\Controllers\frontend;
Use App\Model\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function Loginform()
	{

		return view('frontend.LoginForm');
	}

	public function doLogin(Request $request)
	{

		 $credentials = $request->only('role','email', 'password');
			//dd($request->all());
        //dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {

            //dd($credentials);

          if(auth()->user()->role=='admin')
        {
          return redirect('/admin');
        }

        else{
          return redirect('/products');
        }
    }
        else
        {

        session()->flash('message','Invalid');
         return redirect()->back();
        }
    }

   public function logout(){

   	Auth::logout();

   	 return Redirect()->back();
   }


}

