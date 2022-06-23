<?php

namespace App\Http\Controllers\Tailor;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Cloth_category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $viewcategory=Category::where('tailor_id',Auth::id())->get();
        return view('tailor.categories.index',compact('viewcategory'));
    }

    public function add()
    {
        $category=Cloth_category::all();
        return view('tailor.categories.add',compact('category'));
    }

    public function postcategory(Request $request)
    {

        $addcategory =new Category();
            $addcategory->cloth_category_id=$request->input('category_id');
            $addcategory->tailor_id=Auth::id();
            $addcategory->save();
            return redirect('tailor/view-categories')->with('status',"submitted sewing category successfully");


    }
}
