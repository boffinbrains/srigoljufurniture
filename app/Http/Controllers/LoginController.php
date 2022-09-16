<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
class LoginController extends Controller
{
    public function index(){
        return view('Auth.login');
    }

    public function checkLogin(Request $request){
        $this->validate($request, [
            'username'   => 'required',
            'password'  => 'required'
        ]);
        if(is_numeric($request->username)){
            $user_data = [
                'mobile_number'=>$request->username,
                'password'=>$request->password
            ];
        }elseif(filter_var($request->username, FILTER_VALIDATE_EMAIL)){
            $user_data = [
                'email'=>$request->username,
                'password'=>$request->password,
                //'password'=>Hash::make($request->password),
            ];
        }
        if(Auth::attempt($user_data)){
            return response()->json([
                'response'=> true,
            ],200);
        }else{
            return response()->json([
                //'user'=>$user_data,
                'response'=> false,
            ],403);
        }
    }

    public function successLogin(){
        return view('admin.dashboard.index');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}