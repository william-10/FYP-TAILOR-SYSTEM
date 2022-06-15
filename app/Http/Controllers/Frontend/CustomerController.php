<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {       $orders=Order::where('user_id',Auth::id())->get();
            return view('dashboard.user.orders.index',compact('orders'));
    }

    public function orderhistory()
    {       $orders=Order::where('user_id',Auth::id())->get();
            return view('dashboard.user.orders.history',compact('orders'));
    }

    public function vieworder($id)
    {
        $orders=Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('dashboard.user.orders.view',compact('orders'));
    }
}
