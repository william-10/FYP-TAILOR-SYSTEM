<?php

namespace App\Http\Controllers\Tailor;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $order=OrderItem::where('tailor_id',Auth::id())->get();
        // $order=$orderitems->orders->where('status','0')->get();

        return view('tailor.orders.index',compact('order'));

    }
}
