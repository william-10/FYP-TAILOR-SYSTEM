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
     public function registertailor(Request $request)
     {  $validatedData = $request->validate([
        'tailor_name' => 'required|string',
        'phone' => 'required|string',
        'email' => 'email|required|unique:tailors',
        'password' => 'required|string'
    ]);


    $validatedData['password'] = bcrypt($request->password);

    $user = Tailor::create($validatedData);
    $user->createApiToken();
         return response()->json(['status',"registerd"]);
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
            $user=Auth::guard('tailor')->user();
             return response()->json($user);
         }

         elseif( Auth::guard('web')->attempt($creds))
         {
            $user=Auth::guard('web')->user();
            $token=auth()->user()->createApiToken();
             return response()->json([
                'status'=>'Customer successfull loged in',
                'Customer'=>$user]);

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
