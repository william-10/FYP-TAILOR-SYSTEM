<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TailorController extends Controller
{
    public function profileUpdate(Request $request){
        //validation rules

        $request->validate([
            'tailor_name' =>'required|min:4|string|max:20',
            'password'=>'required|min:5|max:30'


        ]);

        $user =Auth::user();
        $user->tailor_name = $request['tailor_name'];
        $user->phone = $request['phone'];
        $user->password = Hash::make($request['password']);
        $user->address = $request['address'];
        $user->region = $request->input('name');
        $user->city = $request->input('city_name');

        $user->update();
        return redirect()->json([
            'success'=>"Profile Updated successfully",
            'user'=>$user]);

    }


    public function index()
    {
        $region=Region::all();
        $city=City::all();

        if(Tailor::where('tailor_id',Auth::id())->exists())
        {   $category=Cloth_category::all();
            $ratings=Rating::where('tailor_id',Auth::id())->get();
            $rating_sum=Rating::where('tailor_id',Auth::id())->sum('stars_rated');
            if($ratings->count()>0)
            {
                $rating_value=$rating_sum/$ratings->count();
            }
            else{
                $rating_value=0;
            }

            return response()->json()([
                'region'=>$region,
                'city'=>$city,
                'ratings'=>$ratings,
                'rating_value'=>$rating_value,
                'category'=>$category
            ]);

        }
        else{
            return back()->with('status','tailor not found');
        }

    }


}
