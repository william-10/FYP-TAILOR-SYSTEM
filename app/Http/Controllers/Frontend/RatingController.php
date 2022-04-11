<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Rating;
use App\Models\Tailor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated=$request->input('product_rating');
        $tailor_id=$request->input('tailor_id');

        $tailor_check=Tailor::where('tailor_id',$tailor_id)->first();
        if($tailor_check)
        {
            $verified_purchase=Order::where('orders.user_id',Auth::id())
                ->join('order_items','orders.id','order_items.order_id')
                ->where('order_items.tailor_id',$tailor_id)->get();

                if($verified_purchase->count() >0)
                {
                    $existing_rating=Rating::where('user_id',Auth::id())->where('tailor_id',$tailor_id)->first();
                    if($existing_rating)
                    {

                        $existing_rating->stars_rated=$stars_rated;
                        $existing_rating->update();
                    }
                    else
                    {
                            Rating::create([
                                'user_id' =>Auth::id(),
                                'tailor_id' =>$tailor_id,
                                'stars_rated' =>$stars_rated
                        ]);
                    }
                    return redirect()->back()->with('status',"Thank you for rating the tailor");

                }

                else{

                    return redirect()->back()->with('status',"You can not rate A tailor without purchasing the product");
                }
        }

        else{

            return redirect()->back()->with('status',"The link was broken");
        }
    }
}
