<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Tailor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
public function index()
{
    $tailor=Tailor::get();
        return view('dashboard.user.tailors.index',compact('tailor'));
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
              return redirect('/user/login')->with('success','you are now registerd successfully');
          }
          else{
            return redirect()->back()->with('fail','something went wrong, failed to register');
          }

    }

     public function check(Request  $request)
     {
        $request->validate([

            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30'

        ],
        [
            'email.exists'=>'This email does not exist',

        ]);

        $creds =$request->only('email','password');
        if( Auth::guard('web')->attempt($creds))
            {
                return redirect('user/home');    //it was 'user.home'
            }
            else{
                return redirect('/user/login')->with('status','invalid credentials');
            }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('user/home');
    }

}
