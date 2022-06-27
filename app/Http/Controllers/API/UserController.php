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



     public function createuser(Request  $request)
     {
           $validateddata=$request->validate([
                 'name'=>'required',
                 'lname'=>'required',
                 'email'=>'required|email|unique:users,email',
                 'password'=>'required|min:5|max:30',
           ]);

           $validateddata['password'] = bcrypt($request->password);

           $user = User::create($validateddata);
           $user->createApiToken();

        //    $user=new User();
        //    $user->name = $request->name;
        //    $user->lname = $request->lname;
        //  $user->phone = $request->phone;
        //    $user->email = $request->email;

        //    $user->password = Hash::make($request->password);
        //    $user->createApiToken();
        //    $save=$user->save();

        return response()->json([
            'status'=>"registerd",
            'user'=>$user]);


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
                 return response()->json([
                        'status'=>"registerd",
                            'tailor'=>$user]);
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
            // $token=Auth::guard('tailor')->user()->createApiToken();
             return response()->json([
                'status'=>'Tailor successfull loged in',
                'tailor'=>$user]);
         }

         elseif( Auth::guard('web')->attempt($creds))
         {
            $user=Auth::guard('web')->user();
            // $token=auth()->user()->createApiToken();
             return response()->json([
                'status'=>'Customer successfull loged in',
                'Customer'=>$user]);

         }
         else{
            return response()->json(['status'=>'failed to login']);

         }
     }
     public function logout(Request $request)
     {
        $user = Auth::guard('web')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['Success' => 'Logged out'], 200);
         Auth::guard('web')->logout();

     }

}
