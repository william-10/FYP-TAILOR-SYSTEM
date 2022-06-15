<?php

namespace App\Http\Controllers\API;

use Auth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{

       //Register user
       public function register(Request $request)
       {
           //validate fields
           $attrs = $request->validate([
               'name' => 'required|string',
               'lname' => 'required|string',
               'phone' => 'required|string',
               'email' => 'required|email|unique:users,email',
               'password' => 'required|min:8|confirmed'
           ]);

           //create user
           $user = User::create([
               'name' => $attrs['name'],
               'lname' => $attrs['lname'],
               'phone' => $attrs['phone'],
               'email' => $attrs['email'],
               'password' => bcrypt($attrs['password'])
           ]);

           //return user & token in response
           return response([
               'user' => $user,
               'token' => $user->createToken('secret')->plainTextToken
           ], 200);
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
        } else {
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
