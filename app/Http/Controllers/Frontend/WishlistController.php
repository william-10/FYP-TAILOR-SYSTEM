<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $products=Product::get();
        $wishlist=Wishlist::where('user_id',Auth::id())->get();
        return view('dashboard.user.wishlist',compact('wishlist','products'));
    }

    public function add(Request $request)
    {

            if(Auth::check())
            {
                $prod_id=$request->input('product_id');
                $prod_check=Product::where('id',$prod_id)->first();

                if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name." Already added to Wishlist"]);

                }


                    elseif(Product::find($prod_id))
                    {
                        $wish=new Wishlist();
                        $wish->user_id=Auth::id();
                        $wish->prod_id=$prod_id;
                        $wish->save();
                        return response()->json(['status' =>"Product addded to wishlist"]);

                    }

                    else{
                        return response()->json(['status' =>"Product does not exist"]);
                    }
            }

            else{
                return response()->json(['status'=>"Login to continue"]);

            }
    }

    public function deleteitem(Request $request)
    {
        if(Auth::check()){
            $prod_id=$request->input('prod_id');
            if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                    $wishistitem=Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                    $wishistitem->delete();
                    return response()->json(['status' => "Item is deleted from the wishlist"]);
            }
        }
            else
            {
                return response()->json(['status' => "Login to continue"]);
            }
    }
}
