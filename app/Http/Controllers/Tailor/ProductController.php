<?php

namespace App\Http\Controllers\Tailor;

use App\Models\Gender;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cloth_category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=auth()->user()->products()->get();
        return view('tailor.product.index',compact('product'));

    }


    public function create()
    {
        $category=Cloth_category::all();
        $gender=Gender::all();
        return view('tailor.product.add',compact('category','gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $gender=new Gender();
        // $category=new Cloth_category();

        // $request->validate([
        //     'name'=>'required',
        //     'description'=>'required',
        //     'selling_price'=>'required',
        //     'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        // ]);


        // $input=$request->all();

        $product=new Product();
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/product/',$filename);
            $product->image=$filename;
        }


        $product->tailor_id=Auth::user()->tailor_id;
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->slug=$request->input('slug');
        $product->category_id=$request->input('category_id');
        $product->gender_id=$request->input('gender_id');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->qty=$request->input('qty');
        $product->status=$request->input('status') == TRUE ? '1':'0';
        $product->trending=$request->input('trending')== TRUE ? '1':'0';
        $product->upper_part=$request->input('upper_part') == TRUE ? '1':'0';
        $product->lower_part=$request->input('lower_part')== TRUE ? '1':'0';

        $product->save();

        return redirect ('tailor/view-product')->with('status',"Product added successfully");
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
        $product= Product::find($id);
        $category=Cloth_category::all();
        $gender=Gender::all();
        return view('tailor.product.edit', compact('product','category','gender'));
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
        $product=Product::find($id);
        if($request->hasFile('image'))
        {
            $path='assets/uploads/product/'.$product->image;
            if(File::exists($path))
            {
                    File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/product/',$filename);
            $product->image=$filename;
        }

        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->slug=$request->input('slug');
        $product->category_id=$request->input('category_id');
        $product->gender_id=$request->input('gender_id');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->qty=$request->input('qty');
        $product->status=$request->input('status') == TRUE ? '1':'0';
        $product->trending=$request->input('trending')== TRUE ? '1':'0';

        $product->upper_part=$request->input('upper_part') == TRUE ? '1':'0';
        $product->lower_part=$request->input('lower_part')== TRUE ? '1':'0';
        $product->update();

        return redirect ('tailor/view-product')->with('status',"Product updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::find($id);
        $path='assets/uploads/product/'.$product->image;
            if(File::exists($path))
            {
                    File::delete($path);
            }

        $product->delete();
        return redirect('tailor/view-product')->with('status',"Product deleted successfully");
    }
}
