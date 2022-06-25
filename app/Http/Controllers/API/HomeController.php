<?php

namespace App\Http\Controllers\API;

use Auth;
use Validator;
use App\Models\User;
use App\Models\Tailor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{

       //Register user
    //    public function register(Request $request)
    //    {
    //        //validate fields
    //         $request->validate([
    //            'name' => 'required|string',
    //            'lname' => 'required|string',
    //            'phone' => 'required|string',
    //            'email' => 'required|email|unique:users,email',
    //            'password' => 'required|min:8|string'
    //        ]);

    //        //create user
    //        $user = new User([
    //            'name' => $request->name,
    //            'lname' => $request->lname,
    //            'phone' => $request->phone,
    //            'email' => $request->email,
    //            'password' => Hash::make($request->password)
    //        ]);

    //        //return user & token in response
    //        $user->save();
    //        return response()->json([
    //            'message'=>"User has been registered"
    //                    ], 200);
    //    }


    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'lname' => 'required|string',
            'phone' => 'required|string',
            'email' => 'email|required|unique:users',
            'password' => 'required|string'
        ]);


        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createApiToken();

        return response([ 'user' => $user, 'access_token' => $accessToken]);
    }


    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $token = auth()->user()->createApiToken(); #Generate token
            return response()->json(['status' => 'Authorised', 'token' => $token ], 200);
        }

        if(Auth::guard('tailor')->attempt(['email' => $request->email, 'password' => $request->password])){
            $token = Tailor::createApiToken(); #Generate token
            return response()->json(['status' => 'Authorised', 'token' => $token ], 200);
        }

        else {
            return response()->json(['status'=>'Unauthorised'], 401);
        }
    }

    public function index() {
        $users = User::latest()->paginate(10);

        if($users->count()) {
            return response()->json(['status' => 'true' ,'data' => $users], 200);
        } else{
            return response()->json(['status' => 'false'], 401);
        }
    }
}
