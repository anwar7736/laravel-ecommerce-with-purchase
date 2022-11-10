<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;


class AuthController extends Controller
{
    public function login(){

        if (auth()->user()) {
            return redirect()->route('admin.dashboard');
        }
        return view('backend.auth.login');
    }

    public function postLogin(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("admin-login")->withSuccess('Oppes! You have entered invalid credentials');
        
    }

}
