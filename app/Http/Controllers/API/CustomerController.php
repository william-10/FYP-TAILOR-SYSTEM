<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {       $orders=Order::where('user_id',Auth::id())->get();
            return request()->json($orders);

    }

    public function vieworder($id)
    {
        $order=Order::where('id',$id)->where('user_id',Auth::id())->first();
        return request()->json($order);
    }

}
