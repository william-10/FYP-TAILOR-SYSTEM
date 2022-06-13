<?php

namespace App\Http\Controllers\API;

use App\Models\Map;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Region;
use App\Models\Tailor;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cloth_category;
use App\Models\Measurement_detail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(Request $request )
    {
        $tailor=Tailor::get();
        return response()->json($tailor);

    }

    public function viewtailor($tailor_id)
    {

        if(Tailor::where('tailor_id',$tailor_id)->exists())
        {

            $tailor_map=Map::where('tailor_id',$tailor_id)->get();

            $unique_tailor=Tailor::findOrFail($tailor_id);

            return response()->json([
                'unique_tailor' =>$unique_tailor,
                'tailor_map'=>$tailor_map
            ]);

        }
        else{
            return response()->json(['status' => "something went wrong"]);
        }

    }

    public function listgallery($tailor_id)
    {
        if(Tailor::where('tailor_id',$tailor_id)->exists())
        {
            $unique_tailor=Gallery::where('tailor_id',$tailor_id)->get();
            return response()->json([
                'unique_tailor'=>$unique_tailor]);

        }
        else{
            return response()->json(['status'=>$tailor_id."tailor gallery not found"]);
        }

    }

    public function map()
    {
        $map=Map::all();
        return response()->json($map);
    }

    public function order()
    {
        $order=Order::all();
        return response()->json($order);
    }

    public function tailor()
    {
        $tailor=Tailor::all();
        return response()->json($tailor);
    }

    public function customers()
    {
        $user=User::all();
        return response()->json($user);
    }

    public function city()
    {
        $city=City::all();
        return response()->json($city);
    }

    public function region()
    {
        $region=Region::all();
        return response()->json($region);
    }

    public function gallery()
    {
        $gallery=Gallery::all();
        return response()->json($gallery);
    }

    public function postcity(Request $request)
    {
        $city=new Region;
        $city->RegionCode=$request->RegionCode;
        $city->name=$request->name;
        $city->save();
        return response()->json([
            "message" => "region record created"
        ], 201);
    }
}
