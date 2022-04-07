<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Cloth_category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category= Cloth_category::all();
        return view('admin.category.index', compact('category'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $request)
    {
        $category =new Cloth_category();
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }

        $category->category_name=$request->input('category_name');
        $category->slug=$request->input('slug');
        $category->status=$request->input('status') == TRUE ? '1':'0';
        $category->popular=$request->input('popular')== TRUE ? '1':'0';
        $category->save();
        return redirect ('admin/categories')->with('status',"Category added successfully");


    }

    public function edit($category_id)
    {

        $category= Cloth_category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category_id)
    {
        $category=Cloth_category::find($category_id);
        if($request->hasFile('image'))
        {
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                    File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image=$filename;
        }

        $category->category_name=$request->input('category_name');
        $category->slug=$request->input('slug');
        $category->popular=$request->input('popular') == TRUE ? '1': '0';
        $category->status=$request->input('status') == TRUE ? '1': '0';
        $category->update();
        return redirect('admin/categories')->with('status',"category updated successfully");

    }
    public function destroy($category_id)
    {
        $category= Cloth_category::find($category_id);
        $category->delete();
        return redirect('admin/categories')->with('status',"Category deleted successfully");
    }
}
