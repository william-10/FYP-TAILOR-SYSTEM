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

    public function home()
    {
        return view('admin.index');
    }
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
            return redirect()->route('tailor.login')->with('error','invalid credentials');
        }

}
public function logout()
{
    Auth::guard('admin')->logout();
    return redirect('/tailor/login');
}

public function index()
    {
        $tailor= Tailor::paginate(6);
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
    $request->validate([

    'phone'=>'required',
    'tailor_name'=>'required',
    'password'=>'required|min:5|max:12'
    ]);

    $tailor_email=$request->input('email');

    $tailor_check=Tailor::where('email',$tailor_email)->first();
    if($tailor_check)
    {

        return redirect()->back()->with('status','something went wrong, failed to register');
}

else{
    $user=Tailor::Create([
        'tailor_name'=>$request->tailor_name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'password'=>Hash::make($request->password)]);

        $user->createApiToken();

            return redirect('admin/view_tailors')->with('status','you registerd Tailor successfully');

  }
}

public function statusupdate(Request $request)
{
    $tailor_id=$request->input('tailor_id');

    $Tailor_check=Tailor::where('tailor_id',$tailor_id)->first();
    if($Tailor_check->status=="1")
    {
        $Tailor_check->status="0";
        $Tailor_check->update();
        return redirect()->back()->with('success',"status updated successfully");
    }

    elseif($Tailor_check->status=="0")
    {
        $Tailor_check->status="1";
        $Tailor_check->update();
        return redirect()->back()->with('success',"status updated successfully");
    }
}


}
