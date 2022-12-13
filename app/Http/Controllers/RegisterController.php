<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()

    {
        if (auth()->user() && auth()->user()->is_admin == 1) {
            return redirect('/admin/dashboard');
        } else if (auth()->user() && auth()->user()->is_admin == 0) {
            return redirect('/dashboard');
        }
        return view('register');
    }

   function valRegister(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'confirm_password' => 'required|same:password',
            'password'=>'required'
            
        ]);
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => hash::make($request->password)
        ]);
        if ($request == '') {
            return redirect('validation_register')->with('error', 'Somthing went wrong!!.');
        } else {

            return back()->with('success', 'Register Submited Successfully.');
        }
    
        
    }
}
