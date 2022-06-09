<?php

namespace App\Http\Controllers\API;

use App\Models\Map;
use App\Models\Rating;
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

            $tailor_map=Map::where('tailor_id',$tailor_id)->first();

            $unique_tailor=Tailor::findOrFail($tailor_id);

            return response()->json($unique_tailor,$tailor_map);

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
            return response()->json($unique_tailor);

        }
        else{
            return response()->json(['status'=>$tailor_id."tailor gallery not found"]);
        }

    }

}
