<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Tailor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
 //
 public function index()
 {
     $tailor=Tailor::get();
     return request()->json($tailor);
 }



     public function create(Request  $request)
     {
           $request->validate([
                 'name'=>'required',
                 'lname'=>'required',
                 'email'=>'required|email|unique:users,email',

                 'password'=>'required|min:5|max:30',
                 'cpassword'=>'required|min:5|max:30|same:password'
           ]);


           $user=new User();
           $user->name = $request->name;
           $user->lname = $request->lname;
         $user->phone = $request->phone;
           $user->email = $request->email;

           $user->password = \Hash::make($request->password);
           $save=$user->save();


           if($save){
            return request()->json($save);
           }
           else{
            return request()->json('bad registration');
           }

     }

      public function check(Request  $request)
      {
         $request->validate([

             'email'=>'required',
             'password'=>'required|min:5|max:30'

         ],
         [
             'email.exists'=>'This email does not exist',

         ]);

         $creds =$request->only('email','password');
         if( Auth::guard('tailor')->attempt($creds))
         {
             return response()->json(['status'=>'Tailor successfull loged in']);
         }

         elseif( Auth::guard('web')->attempt($creds))
         {
             return response()->json(['status'=>'Customer successfull loged in']);

         }
         else{
            return response()->json(['status'=>'failed to login']);

         }
     }
     public function logout()
     {
         Auth::guard('web')->logout();
         return redirect('user/home');
     }

}
