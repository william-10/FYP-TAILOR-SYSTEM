<?php

namespace App\Http\Controllers\Tailor;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{

    public function view()
    {
        $gallery=auth()->user()->gallery()->paginate(1);
        return view('tailor.gallery.index',compact('gallery'));
    }

    public function add()
    {
        return view('tailor.gallery.add');
    }

    public function store(Request $request)
    {

        $input=$request->all();

        $request->tailor_id=Auth::user()->tailor_id;

        if($request->hasFile('image'))
        {
            // $file=$request->file('image');
            // $ext=$file->getClientOriginalExtension();
            // $filename=time().'.'.$ext;
            // $file->move('assets/uploads/gallery/',$filename);
            // $input['image']="$filename";

            $file = $request->file('image');
            $destinationPath = "gallery";
            $filename = time().'.'. $file->getClientOriginalExtension();

            Storage::putFileAs($destinationPath, $file, $filename);
            $input['image']="$filename";

        }

        $gallery=Gallery::Create($input);

        return redirect ('tailor/view-gallery')->with('success',"picture added successfully");
    }

    public function destroy( $id)
    {
        $picture= Gallery::find($id);

        unlink(public_path().'/storage/gallery/'.$picture->image);
        $picture->delete();

        return redirect('tailor/view-gallery')->with('success',"Picture deleted successfully");


    }

}

