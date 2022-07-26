<?php

namespace App\Http\Controllers\Tailor;

use App\Models\Order;
use App\Models\Rating;
use PDF;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    public function index()
    {   
        $order=Order::where('tailor_id',Auth::id())->get();
        $notification=Notification::where('tailor_id',Auth::id())->get();
        $ratings=Rating::where('tailor_id',Auth::id())->get();
        $rating_sum=Rating::where('tailor_id',Auth::id())->sum('stars_rated');
        if($ratings->count()>0)
        {
            $rating_value=$rating_sum/$ratings->count();
        }
        else{
            $rating_value=0;
        }

        return view('tailor.report.index',compact('order','ratings','notification','rating_value','rating_sum'));
    }

    public function pdf()
    {
        $tailor = Order::where('tailor_id',Auth::id())->get();
        $pdf = PDF::loadView('tailor.report.pdf', compact('tailor'));
        
        return $pdf->stream('order.pdf');
    }


}
