<?php

namespace App\Http\Controllers\Tailor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tailor;
use Illuminate\Support\Facades\Auth;

class TailorController extends Controller
{
    public function create(Request  $request)
    {
          $request->validate([
                'tailor_name'=>'required',
                'phone'=>'required|min:10|max:10',
                'location'=>'required',
                'address'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:5|max:30',
                'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $tailor=new Tailor();
          $tailor->tailor_name = $request->tailor_name;
          $tailor->email = $request->email;
          $tailor->phone = $request->phone;
          $tailor->location = $request->location;
          $tailor->address = $request->address;
          $tailor->password = \Hash::make($request->password);
          $save=$tailor->save();

          if($save){
            return redirect()->route('tailor.login')->with('success','you are now registerd successfully');
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
                'email.exists'=>'This email does not exist'
            ]);

            $creds =$request->only('email','password');
            if( Auth::guard('tailor')->attempt($creds))
                {   
                    return redirect()->route('tailor.home');
                }
                else{
                    return redirect()->route('tailor.login')->with('fail','invalid credentials');
                }
        }
        public function logout()
        {
            Auth::guard('tailor')->logout();
            return redirect()->route('tailor.login');
        }


        public function index()
    {
        
        return view('tailor.details.index');
    }

    public function edit()
    {
        return view('tailor.details.edit');
    }

    public function profileUpdate(Request $request){
        //validation rules

        $request->validate([
            'tailor_name' =>'required|min:4|string|max:20'
            
        ]);
        
        $user =Auth::user();
        $user->tailor_name = $request['tailor_name'];
        $user->phone = $request['phone'];
        $user->location = $request['location'];
        $user->address = $request['address'];
        $user->save();
        return redirect('tailor/details')->with('status',"Profile Updated");
        
    }



}