<?php

namespace App\Http\Controllers\Tailor;

use App\Models\Map;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{

    public function index()
    {
        $map=auth()->user()->maps()->get();
        return view('tailor.map.index',compact('map'));

    }
    public function create()
    {
            return view('tailor.map.add');
    }


    public function view($id)
    {
            $map=Map::find($id);
            return view('tailor.map.view',compact('map'));
    }

    public function store(Request $request )
    {
        $map=new Map();
        $map->tailor_id=Auth::user()->tailor_id;
        $map->latitude=$request->input('lat');
        $map->address=$request->input('address');
        $map->longitude=$request->input('lng');
        $map->save();

        return redirect('tailor/list-map')->with('success',"Map location added successfully");
    }

    public function update(Request $request, $id)
    {
        $map=Map::find($id);

        $map->address=$request->input('address');
        $map->latitude=$request->input('lat');
        $map->longitude=$request->input('lng');

        $map->update();

        return redirect()->back()->with('success',"Map updated successfully");

    }
    public function destroy($id)
    {
        $map= Map::find($id);
        $map->delete();
        return redirect('tailor/list-product')->with('success',"Map location deleted successfully");
    }


}
