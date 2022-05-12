<?php

namespace App\Http\Controllers\Tailor;

use App\Models\Map;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    public function create()
    {
            return view('tailor.map.index');
    }

    public function store(Request $request )
    {
        $map=new Map();
        $map->tailor_id=Auth::user()->tailor_id;
        $map->latitude=$request->input('lat');
        $map->address=$request->input('address');
        $map->longitude=$request->input('lng');
        $map->save();

        return redirect ('tailor/add-map')->with('status',"Map location added successfully");
    }
}
