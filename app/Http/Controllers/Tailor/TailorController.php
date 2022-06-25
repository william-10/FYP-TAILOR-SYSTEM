<?php

namespace App\Http\Controllers\Tailor;

use Storage;
use App\Models\City;
use App\Models\Rating;
use App\Models\Region;
use App\Models\Tailor;
use Illuminate\Http\Request;
use App\Models\Cloth_category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class TailorController extends Controller
{
    public function region()
    {
        $path= Storage::disk('local')->get('tz.json');
       $content = json_decode(json_encode($path), true);
       return view("region",[
           "content"=>json_decode($content)
       ]);


    }

    public function create(Request  $request)
    {
          $request->validate([
                'tailor_name'=>'required',
                'phone'=>'sometimes|min:10|max:10',
                'avator'=>'sometimes|image|mimes:jpg,jpeg,bmp,svg,png|max:5000',

                'address'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:5|max:30',
                'cpassword'=>'required|min:5|max:30|same:password'
          ]);

        if($request->hasFile('avator'))
        {
            $avatoruploaded=$request->file('avator');
            $ext=$avatoruploaded->getClientOriginalExtension();
            $avatorname=time().'.'.$ext;
            $avatorpath=public_path('/assets/uploads/avator/');
            $avatoruploaded->move($avatorpath, $avatorname);

            $save=Tailor::Create([
                'tailor_name'=>$request->tailor_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request['address'],
                'password'=>Hash::make($request->password),
                'avator'=>'/assets/uploads/avator/'. $avatorname
            ]);




        if($save){
            return redirect()->route('tailor.login')->with('status','you are now registerd successfully');
        }
        else{
          return redirect()->back()->with('fail','something went wrong, failed to register');
        }


        }

        $save=Tailor::Create([
            'tailor_name'=>$request->tailor_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request['address'],
            'password'=>Hash::make($request->password)]);
            if($save){
                return redirect()->route('tailor.login')->with('success','you are now registerd successfully');
            }
            else{
              return redirect()->back()->with('fail','something went wrong, failed to register');
            }



}
        public function check(Request  $request)
        {
            $request->validate([

                'email'=>'required',
                'password'=>'required|min:5|max:30'
            ],
            [
                'email.exists'=>'This email does not exist'
            ]);

            $creds =$request->only('email','password');
            if( Auth::guard('tailor')->attempt($creds))
                {
                    return redirect()->route('tailor.home')->with('success','Welcome');
                }


                elseif( Auth::guard('admin')->attempt($creds))
                {
                    return redirect()->route('admin.home')->with('success','Welcome');
                }

                elseif( Auth::guard('web')->attempt($creds))
                {
                    return redirect('/user/home');
                }
                else{
                    return redirect()->route('tailor.login')->with('fail','invalid credentials');
                }
        }
        public function logout()
        {
            Auth::guard('tailor')->logout();
            return redirect()->route('tailor.login');
        }


        public function index()
    {
        $region=Region::all();
        $city=City::all();

        if(Tailor::where('tailor_id',Auth::id())->exists())
        {   $category=Cloth_category::all();
            $ratings=Rating::where('tailor_id',Auth::id())->get();
            $rating_sum=Rating::where('tailor_id',Auth::id())->sum('stars_rated');
            if($ratings->count()>0)
            {
                $rating_value=$rating_sum/$ratings->count();
            }
            else{
                $rating_value=0;
            }

            return view('tailor.details.index',compact('region','city','ratings','rating_value','category'));

        }
        else{
            return back()->with('status','tailor not found');
        }

    }

    public function edit()
    {
        return view('tailor.details.edit');
    }

    public function profileUpdate(Request $request){
        //validation rules

        $request->validate([
            'tailor_name' =>'required|min:4|string|max:20',
            'password'=>'required|min:5|max:30'


        ]);

        $user =Auth::user();
        $user->tailor_name = $request['tailor_name'];
        $user->phone = $request['phone'];
        $user->password = Hash::make($request['password']);
        $user->address = $request['address'];
        $user->region = $request->input('name');
        $user->city = $request->input('city_name');

        $user->update();
        return redirect('tailor/details')->with('success',"Profile Updated successfully");

    }

    public function view()
    {
        return view('Tailor.Gallery.avator');
    }

    public function updateavator(Request $request)
    {
        $user =Auth::user();
        if($request->hasFile('avator'))
        {
            // $avatorpath=$user->avator;
            // if(File::exists($avatorpath))
            // {
            //          File::delete($avatorpath);
            // }
            // $avatoruploaded=$request->file('avator');
            // $ext=$avatoruploaded->getClientOriginalExtension();
            // $avatorname=time().'.'.$ext;
            // $avatorpath=public_path('/assets/uploads/avator/');
            //  $avatoruploaded->move($avatorpath, $avatorname);


            $file = $request->file('avator');
            $destinationPath = "avator";
            $filename = time().'.'. $file->getClientOriginalExtension();

            Storage::putFileAs($destinationPath, $file, $filename);
            $user['avator']="$filename";

             $user->avator='/storage/avator/'.$filename;
             $user->update();


        }
              return redirect('tailor/home')->with('success',"profile picture updated successfully");

    }
}
