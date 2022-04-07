<?php

namespace App\Http\Controllers\User;

use App\Models\Tailor;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cloth_category;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{

    public function index()
    {
        $tailor=Tailor::get();
        return view('dashboard.user.tailors.index',compact('tailor'));
    }

    public function viewtailor($tailor_id)
    {

        if(Tailor::where('tailor_id',$tailor_id)->exists())
        {


            $unique_tailor=Tailor::findOrFail($tailor_id);
            $tailor_product=Product::where('tailor_id',$tailor_id)->get();
            return view('dashboard.user.tailors.view',compact('unique_tailor','tailor_product'));

        }
        else{
            return back()->with('status','tailor not found');
        }

    }

    public function listgallery($tailor_id)
    {
        if(Tailor::where('tailor_id',$tailor_id)->exists())
        {
            $unique_tailor=Gallery::where('tailor_id',$tailor_id)->get();
            return view('dashboard.user.tailors.gallery',compact('unique_tailor'));

        }
        else{
            return redirect('/user/view-tailor/'.$tailor_id)->with('status','tailor gallery not found');
        }

    }




public function tailorproduct()
    {



        // $tailor_product=Tailor::where('tailor_id',$tailor_id)->get();
        $tailor_product=Product::get();

        return view('dashboard.user.tailors.product',compact('tailor_product'));


}


public function product()
{

        $products=Product::get();
        return view('dashboard.user.products.index',compact('products'));

}

public function viewproduct($cate_slug,$prod_slug)
{
    if(Cloth_category::where('slug',$cate_slug)->exists())
    {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $products=Product::where('slug',$prod_slug)->first();
                return view('dashboard.user.products.view',compact('products'));
            }
            else{
                return back()->with('status','link was broken');
            }
    }
    else{
        return back()->with('status','category details not found');
    }
}

}
