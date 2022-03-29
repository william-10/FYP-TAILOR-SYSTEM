<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gender=Gender::all();
        return view('admin.gender.index',compact('gender'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gender.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gender=New Gender();
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/gender/',$filename);
            $gender->image = $filename;
        }
        $gender->name=$request->input('name');
        $gender->save();
        return redirect ('admin/gender')->with('status',"Gender added successfully");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $gender= Gender::find($id);
        return view('admin.gender.edit', compact('gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gender=Gender::find($id);
        if($request->hasFile('image'))
        {
            $path='assets/uploads/gender/'.$gender->image;
            if(File::exists($path))
            {
                    File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/gender/',$filename);
            $gender->image=$filename;
        }
        $gender->name=$request->input('name');
        $gender->update();
        return redirect('admin/gender')->with('status',"Gender details updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gender= Gender::find($id);
        $path='assets/uploads/gender/'.$gender->image;
            if(File::exists($path))
            {
                    File::delete($path);
            }

        $gender->delete();
        return redirect('admin/gender')->with('status',"Gender deleted successfully");
    }
}
