<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Cloth_category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $viewcategory=Category::where('tailor_id',Auth::id())->get();
        return response()->json([
            'viewcategory'=>$viewcategory
        ]);
    }

    public function add()
    {
        $category=Cloth_category::all();
        return response()->json([
            'category'=>$category
        ]);
    }

    public function postcategory(Request $request)
    {

        $addcategory =new Category();
            $addcategory->cloth_category_id=$request->input('category_id');
            $addcategory->tailor_id=Auth::id();
            $addcategory->save();
            return response()->json([
                'status'=>"submitted sewing category successfully"]);


    }

}
