<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    public function login(Request $request){

        $url=session()->get('url');

        if (empty($url)) {
            $url= route('front.home');
        }

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['success'=>true,'msg'=>'Successfully Login !','url'=>$url]);
        }
  
        return response()->json(['success'=>false,'msg'=>'Oppes! You have entered invalid credentials !']);
        
    }


    public function register(Request $request){

        $request->validate([
            'email' => 'required|email|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        $url=session()->get('url');

        if (empty($url)) {
            $url= route('front.home');
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['success'=>true,'msg'=>'Successfully Register !', 'url'=>$url]);
        }
        return response()->json(['success'=>false,'msg'=>'Oppes! You have entered invalid credentials !']);
        
    }



    public function create(array $data)
    {

      return User::create([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

}
