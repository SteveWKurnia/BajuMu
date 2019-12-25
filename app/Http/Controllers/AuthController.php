<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('layouts.login');
    }

    public function register(){
        return view('layouts.register');
    }

    public function doRegister(Request $request){
        $user = new User();

        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->password = bcrypt($request->user_password);

        $user->save();

        return redirect()->back();
    }

    public function doLogin(Request $request){
        $email = $request->email;
        $password = $request->password;

        $credentials =[
            'email'=>$email,
            'password'=>$password
        ];

        if(Auth::attempt($credentials)){
            return redirect('/');
        }else{
            return redirect()->back();
        }
    }

    public function doLogout(){
        Auth::logout();
        return redirect('/');
    }

}
