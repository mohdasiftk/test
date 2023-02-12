<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $input = ['email' => $request->email,'password' => $request->password];
        if(auth()->attempt($input,true)){
            return redirect()->route('home')->with('message', 'Success fully logged in..!');
        }else{
            return back()->with('message','Login Failed');
        }   
        
    }
    public function logout()
    {
        auth()->logout();
        return view('login');
    }
}
