<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class BackendController extends Controller
{

    public function registarUser(Request $request)
    {
        //dd($request->all());
       $this->validate($request,[

        'password'=>'required|min:5',

      ]);
        $data=[
               //'database column name'=>'form input field name'
               'name'=>$request->input('name'),
               'role'=>$request->input('role'),
               'email'=>$request->input('email'),
               'district'=>$request->input('district'),
               'address'=>$request->input('address'),
               'number'=>$request->input('number'),
               'password'=> Hash::make($request->input('password'))
        ];

        User::create($data);

        session()->flash('message','Registration Successful');
         return redirect()->back();


    }


    public function dashboard(){
      return view ('backend.dashboard');
    }


	    public function showUsers(){

      $all_users=User::orderBy('id', 'desc')->where('id','!=',12)->get();
      //dd($all_users);
      return view ('backend.users',compact('all_users'));

    }



      public function deleteUsers($id){

        DB::table('users')->where('id',$id)->delete();
        return redirect()->back();
      }



      public function editUsers($id){

         $edit=User::where('id',$id)->first();
        return view('backend.edituser',compact('edit'));
      }


      public function updateUsers(Request $request,$id){

        User::where('id',$id)->update([
               'name'=>$request->input('name'),
               'email'=>$request->input('email'),
               'district'=>$request->input('district'),
               'address'=>$request->input('address'),
               'number'=>$request->input('number')
        ]);


        return redirect('/admin/users')->with('message','Customer info Update Successfully');

      }

}




