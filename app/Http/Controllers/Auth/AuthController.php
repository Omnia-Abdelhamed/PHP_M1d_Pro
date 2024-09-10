<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function handleLogin(Request $request){
        $data=$request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8' // 12345
        ]);
        $isLogin=Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if(!$isLogin){
            return redirect()->back();
        }
        if(Auth::user()->role == 'admin'){
            return redirect()->route('home');
        }else{
            return redirect()->route('site.index');
        }
    }
    public function register(){
        return view('auth.register');
    }
    public function handleRegister(Request $request){

        $data=$request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8' // 12345
        ]);
        $password=Hash::make($request->password);
        $data['password']=$password;
        $user=User::create($data);
        Auth::login($user);
        return redirect()->route('site.index');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
