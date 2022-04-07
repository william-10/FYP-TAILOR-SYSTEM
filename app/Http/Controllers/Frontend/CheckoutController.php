<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems=Cart::where('user_id',Auth::id())->get();
        foreach($old_cartitems as $item)
        {
        if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeitem=Cart::where('user_id',Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeitem->delete();

            }
        }
        $cartitems=Cart::where('user_id',Auth::id())->get();
            return view('dashboard.user.cart.checkout',compact('cartitems'));
    }
}
