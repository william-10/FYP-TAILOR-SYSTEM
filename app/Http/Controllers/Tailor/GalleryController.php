<?php

namespace App\Http\Controllers\Tailor;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    
    public function view()
    {
        $gallery=auth()->user()->gallery()->get();
        return view('tailor.gallery.index',compact('gallery'));
    }

    public function add()
    {
        return view('tailor.gallery.add');
    }
    
    public function store(Request $request)
    {   
        $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $input=$request->all();

        $request->tailor_id=Auth::user()->tailor_id;
        
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/gallery/',$filename);
            $input['image']="$filename";
        }

        $gallery=Gallery::Create($input);

        return redirect ('tailor/view-gallery')->with('status',"picture added successfully");
    }

    public function destroy( $id)
    {
        $picture= Gallery::find($id);
        
        unlink(public_path().'/assets/uploads/gallery/'.$picture->image);
        $picture->delete();
        
        return redirect('tailor/view-gallery')->with('status',"Picture deleted successfully");

        
    }

}

