<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function login(){
        if (auth()->user() && auth()->user()->is_admin == 1) {
            return redirect ('/admin/dashboard');
           
        }else if(auth()->user() && auth()->user()->is_admin==0){
            return redirect('/dashboard');

       
        }
        return view('login');
       
    }
    public function vallogin(Request $request)
    {
        $request->validate([
           
            'email' => 'required',
            'password' => 'required'

        ]);
        $user = $request->only('email','password');
        if(Auth::attempt($user)){

            if(Auth::user()->is_admin==1){
                return redirect('/admin/dashboard');

            }else{
                return redirect('/dashboard');

            }

        }else{
            return back()->with('error','Email & password is incorrect!!');
        }
    }
    public function loaddashboard(){
        return view('student.dashboard');
    }
    public function admindashboard()
    {   
        return view('admin.dashboard');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
    
}
