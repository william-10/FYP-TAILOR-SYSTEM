<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Tailor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function check(Request  $request)
    {
        $request->validate([

            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
        ],

    [
        'email.exists'=>'This email does not exist'
    ]);

    $creds =$request->only('email','password');
    if( Auth::guard('admin')->attempt($creds))
        {
            return redirect()->route('admin.home')->with('status','Welcome Administrator');
        }
        else{
            return redirect()->route('admin.login')->with('error','invalid credentials');
        }

}
public function logout()
{
    Auth::guard('admin')->logout();
    return redirect('/tailor/login');
}

public function index()
    {
        $tailor= Tailor::paginate(2);
        return view('admin.management.tailormanage', compact('tailor'));
    }

public function destroy($tailor_id)
{
    $tailor= Tailor::find($tailor_id);
        $tailor->delete();
        return redirect('admin/view_tailors')->with('status',"Tailor deleted successfully");
}

public function customerview()
{
    $user=User::all();
    return view('admin.management.customermanage', compact('user'));
}


public function tailorregister(Request $request)
{
    $save=Tailor::Create([
        'tailor_name'=>$request->tailor_name,
        'email'=>$request->email,
        'location'=>$request->location,
        'phone'=>$request->phone,
        'address'=>$request['address'],
        'password'=>Hash::make($request->password)]);
        if($save){
            return redirect('admin/home')->with('success','you registerd Tailor successfully');
        }
        else{
          return redirect()->back()->with('fail','something went wrong, failed to register');
        }
}

}
