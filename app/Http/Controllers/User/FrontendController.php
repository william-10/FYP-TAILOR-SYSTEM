<?php

namespace App\Http\Controllers\User;

use App\Models\Tailor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{

    public function index()
    {
        $tailor=Tailor::take(4)->get();
        return view('dashboard.user.tailors.index',compact('tailor'));
    }

    public function viewtailor($tailor_name)
    {
        if(Tailor::where('tailor_name',$tailor_name)->exists())
        {
            $unique_tailor=Tailor::where('tailor_name',$tailor_name)->first();
            return view('dashboard.user.tailors.view',compact('unique_tailor'));

        }
        else{
            return redirect('/')->with('status','tailor not found');
        }
        return view('dashboard.user.tailors.view');
    }
}
