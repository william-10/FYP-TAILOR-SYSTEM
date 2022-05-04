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
              return redirect('/tailor/login')->with('success','you are now registerd successfully');
          }
          else{
            return redirect()->back()->with('fail','something went wrong, failed to register');
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
            return redirect()->route('tailor.home');
        }


        elseif( Auth::guard('admin')->attempt($creds))
        {
            return redirect()->route('admin.home')->with('status','Welcome Administrator');
        }

        elseif( Auth::guard('web')->attempt($creds))
        {
            return redirect('/user/home');
        }
        else{
            return redirect()->route('user.login')->with('fail','invalid credentials');
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('user/home');
    }

}
