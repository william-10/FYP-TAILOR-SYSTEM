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
        $order=Order::get();

        return view('tailor.orders.index',compact('orderitem','order'));

    }
}
