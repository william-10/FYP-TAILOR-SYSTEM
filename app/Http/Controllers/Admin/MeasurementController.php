<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Measurement_detail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measurement=Measurement_detail::all();
        return view('admin.measurement.index',compact('measurement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.measurement.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $measurement=New Measurement_detail();
        if($request->hasFile('image1'))
        {
            $file=$request->file('image1');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/measurement/image1/',$filename);
            $measurement->image1 = $filename;
        }

        if($request->hasFile('image2'))
        {
            $file2=$request->file('image2');
            $ext=$file2->getClientOriginalExtension();
            $filename2=time().'.'.$ext;
            $file2->move('assets/uploads/measurement/image2/',$filename2);
            $measurement->image2 = $filename2;
        }


        $measurement->name=$request->input('name');
        $measurement->details=$request->input('details');
        $measurement->save();
        return redirect ('admin/measurement')->with('status',"Measurement details added successfully");



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $measurement= Measurement_detail::find($id);
        return view('admin.measurement.edit', compact('measurement'));
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

        $measurement=Measurement_detail::find($id);
        if($request->hasFile('image1'))
        {
            $path='assets/uploads/measurement/image1/'.$measurement->image1;
            if(File::exists($path))
            {
                    File::delete($path);
            }
            $file=$request->file('image1');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/measurement/image1/',$filename);
            $measurement->image1=$filename;
        }


        if($request->hasFile('image2'))
        {
            $path='assets/uploads/measurement/image2/'.$measurement->image2;
            if(File::exists($path))
            {
                    File::delete($path);
            }
            $file=$request->file('image2');
            $ext=$file->getClientOriginalExtension();
            $filename2=time().'.'.$ext;
            $file->move('assets/uploads/measurement/image2/',$filename2);
            $measurement->image2=$filename2;
        }

        $measurement->name=$request->input('name');
        $measurement->details=$request->input('details');
        $measurement->update();
        return redirect('admin/measurement')->with('status',"Measurement details updated successfully");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $measurement= Measurement_detail::find($id);
        $path='assets/uploads/measurement/image1/'.$measurement->image1;
            if(File::exists($path))
            {
                    File::delete($path);
            }

            $path2='assets/uploads/measurement/image2/'.$measurement->image2;
            if(File::exists($path2))
            {
                    File::delete($path2);
            }


        $measurement->delete();
        return redirect('admin/measurement')->with('status',"Measurement detail deleted successfully");
    }
}
