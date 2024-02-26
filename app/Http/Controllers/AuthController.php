<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // methot untuk menamplkan form login
    public function showFormLogin()
    {
    return view('auth.login');
    }
    
    // method untuk memproses login
    public function login(Request $request){
        // validasi data
      $validateData = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        // cek login
        if(auth()->attempt($validateData)){
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    //method untuk logout
    public function logout(){
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
