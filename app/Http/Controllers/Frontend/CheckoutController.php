<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
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


        // $productcheck2=Product::where('lower_part',"1")->first();

            return view('dashboard.user.cart.checkout',compact('cartitems'));
    }


    public function placeorder(Request $request)
    {

        $order=new Order();

        $order->user_id=Auth::id();
        $order->fname=$request->input('fname');
        $order->lname=$request->input('lname');
        $order->phone=$request->input('phone');
        $order->email=$request->input('email');
        $order->tracking_no='tshop'.rand(1111,9999);
        $total=0;
        $cartitems_total=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $total+=$prod->products->selling_price;
        }
        $order->total_price=$total;
        $order->save();


        $cartitems=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::create([
                    'order_id'=>$order->id,
                    'prod_id'=>$item->prod_id,
                    'tailor_id'=>$item->products->tailors->tailor_id,
                    'qty'=>$item->prod_qty,
                    'price'=>$item->products->selling_price,
                    'bega'=>$item->bega,
                    'kifua'=>$item->kifua,
                    'mkono'=>$item->mkono,
                    'kiuno'=>$item->kiuno,
                    'paja'=>$item->paja,
                    'urefu_juu'=>$item->urefu_juu,
                    'urefu_mguu'=>$item->urefu_mguu,

            ]);
        }

            if(Auth::user()->lname ==NULL)
            {
                $user=User::where('id',Auth::id())->first();
                $user->name=$request->input('fname');
                $user->lname=$request->input('lname');
                $user->phone=$request->input('phone');
                $user->update();

            }
            $cartitems=Cart::where('user_id',Auth::id())->get();
            Cart::destroy( $cartitems);

            return redirect('/user/home')->with('status',"order placed successfully");
    }
}
