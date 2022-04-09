<?php

namespace App\Http\Controllers\Tailor;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orderitem=OrderItem::where('tailor_id',Auth::id())->get();
        // $order=Order::get();

        return view('tailor.orders.index',compact('orderitem',));

    }

    public function vieworder($id)
    {
        $orders=Order::where('id',$id)->first();
        return view('tailor.orders.view',compact('orders'));

    }

    public function updateorder(Request $request,$id)
    {
        $orders=Order::find($id);
        $orders->status=$request->input('order_status');
        $orders->update();
        return redirect('/tailor/orders')->with('status',"Order Updated Successfully");
    }

public function orderhistory()
{
    $orderitem=OrderItem::where('tailor_id',Auth::id())->get();
    return view('tailor.orders.history',compact('orderitem'));
}


}

