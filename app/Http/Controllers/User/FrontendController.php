<?php

namespace App\Http\Controllers\User;

use App\Models\Map;
use App\Models\Rating;
use App\Models\Tailor;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cloth_category;
use App\Models\Measurement_detail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{

    public function index(Request $request )
    {
        $tailor=Tailor::get();
            return view('dashboard.user.tailors.index',compact('tailor'));


        }

    public function searchtailor()
    {
        $tailor=Tailor::select('tailor_name','city','region')->get();
        //  $location=Tailor::select('city','region')->get();

        $data2=[];
        // $data1=[];
        // $data3=[];

        foreach ($tailor as $item1) {
            $data1[]= $item1['tailor_name'];
            $data1[]= $item1['city'];
            $data1[]= $item1['region'];

        }
        // foreach ($location as $item2) {
        //     $data2[]= $item2['city'];
        //     $data2[]= $item2['region'];
        //     // $data3[]= $item2['region'];

        // }

        // foreach ($location as $item3) {
        //     $data3= $item3['region'];
        // }
        return $data1;
        // return $data1;
        // return $data3;


    }
    public function searchtailor_details(Request $request)
    {
        $searched_thing=$request->tailor_search;
        if ($searched_thing!="") {
                $tailor=Tailor::where("tailor_name","LIKE","%$searched_thing%")->first();
                $tailor_city=Tailor::where("city","LIKE","%$searched_thing%")->first();
                $tailor_region=Tailor::where("region","LIKE","%$searched_thing%")->first();
                    if ($tailor) {
                            return redirect('/user/view-tailor/'.$tailor->tailor_id);
                    }
                    elseif ($tailor_city) {
                        return redirect('/user/home');
                    }

                    elseif ($tailor_region) {
                        return redirect('/user/view-tailor/'.$tailor->tailor_id);
                    }
                    else{
                        return redirect()->back()->with("status","No tailor matched your search");
                    }



        }
        else{
            return redirect()->back();
        }

    }

    public function viewtailor($tailor_id)
    {

        if(Tailor::where('tailor_id',$tailor_id)->exists())
        {

            $tailor_map=Map::where('tailor_id',$tailor_id)->first();

            $unique_tailor=Tailor::findOrFail($tailor_id);
            $tailor_product=Product::where('tailor_id',$tailor_id)->get();

            $ratings=Rating::where('tailor_id',$unique_tailor->tailor_id)->get();
            $rating_sum=Rating::where('tailor_id',$unique_tailor->tailor_id)->sum('stars_rated');
            $user_rating=Rating::where('tailor_id',$unique_tailor->tailor_id)
                            ->where('user_id',Auth::id())->first();

            if($ratings->count()>0)
            {
                $rating_value=$rating_sum/$ratings->count();
            }
            else{
                $rating_value=0;
            }
            return view('dashboard.user.tailors.view',compact('unique_tailor','tailor_product','ratings','rating_value','user_rating','tailor_map'));

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
            return response()->json($unique_tailor);

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
        return response()->json($tailor_product);


}


public function product()
{

        $products=Product::get();
        return view('dashboard.user.products.index',compact('products'));
        return response()->json($products);

}

public function viewproduct($cate_slug,$prod_slug)
{

    $measurement=Measurement_detail::get();
    if(Cloth_category::where('slug',$cate_slug)->exists())
    {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $products=Product::where('slug',$prod_slug)->first();

                return view('dashboard.user.products.view',compact('products','measurement'));
                return response()->json($products,$measurement);
            }
            else{
                return back()->with('status','link was broken');
            }
    }
    else{
        return back()->with('status','category details not found');
    }
}

public function viewcartproduct($prod_slug)
{

    $measurement=Measurement_detail::get();
    if(Product::where('slug',$prod_slug)->exists())
            {
                $products=Product::where('slug',$prod_slug)->first();

                return view('dashboard.user.wishlist.view',compact('products','measurement'));
                return response()->json($products,$measurement);
            }
            else{
                return back()->with('status','link was broken');
            }
}

}
