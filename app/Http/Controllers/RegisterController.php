<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'email'=>'required|string|email|unique:users',
            'phone'=>'required|string|unique:users',
        ]);
        $user = new User();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->role=$request->agreement=='on'?1:0;
        $user->password=Hash::make($request->password);

        $user->save();
        return redirect()->route('login')->withSuccess('успех');
//        return view('auth.register');
    }
}
