<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Measurement_detail;
use Illuminate\Support\Facades\Auth;

class OrderingController extends Controller
{

    public function putrequest(Request $request)
    {
         $tailor_id=$request->input('tailor_id');
         Notification::create([
            'user_id' =>Auth::id(),
            'tailor_id' =>$tailor_id

    ]);

    return redirect()->back()->with('status',"Requested successfully...waiting to the office arrival");
    }

    public function viewrequests()
    {   $customer_request=Notification::where('tailor_id',Auth::id())->get();

        return view('tailor.orders.request',compact('customer_request'));
    }

    public function index()
    {
        $orderitem=Order::where('tailor_id',Auth::id())->get();
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
    $orderitem=Order::where('tailor_id',Auth::id())->get();
    return view('tailor.orders.history',compact('orderitem'));
}

public function createorder()
{
    return view('tailor.orders.create');
}

public function addorder(Request $request)
{

    $request->validate([
        'description'=>'required',
        'price'=>'required',
        'customer_email'=>'required']);

    $customer_email=$request->input('customer_email');

    $customer_check=User::where('email',$customer_email)->first();
    if($customer_check)
    {
        // $verified_purchase=Order::where('orders.user_id',Auth::id())
        //     ->join('order_items','orders.id','order_items.order_id')
        //     ->where('order_items.tailor_id',$tailor_id)->get();

        $order=new Order();
        $measurement=new Measurement_detail();

        // $order->user_id=Auth::id();
        $order->tailor_id=$request->input('tailor_id');
        $order->user_id=$customer_check->id;
        $order->price=$request->input('price');
        $order->description=$request->input('description');

        $order->tracking_no='tshop'.rand(1111,9999);
        $order->save();

        $measurement->name=$customer_check->name;
        $measurement->tailor_id=$request->input('tailor_id');
        $measurement->phone=$customer_check->phone;
        $measurement->details=$request->input('measurementdescription');
        $measurement->save();

        return redirect('/tailor/orders')->with('status',"order placed successfully");
    }

    else{

        return redirect()->back()->with('status',"Something went wrong with the email");
    }
}

public function viewmeasurement()
{   $measurement=Measurement_detail::where('tailor_id',Auth::id())->get();
    return view('tailor.measurement.index',compact('measurement'));
}

public function deleterequest($id)
{
    $notification= Notification::find($id);
        $notification->delete();
        return redirect('tailor/view-requests')->with('status',"Request deleted successfully");
}

public function deleteorder($id)
{   
 
    $order=Order::find($id);
    $order->delete();
        return redirect()->back()->with('success',"order deleted successfully");
   
}


public function deletemeasurement($id)
{   
 
    $measuremenent=Measurement_detail::find($id);
    $measuremenent->delete();
        return redirect()->back()->with('success',"measurement details deleted successfully");
   
}
}
