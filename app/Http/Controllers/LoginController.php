<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use APP\Mo

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            if (auth()->user()->role == 'администратор' || auth()->user()->role == 2) {
                return redirect()->route('Adminindex');
            } else {
                return redirect()->route('glob');
            }
        } else {
            return redirect()->route('auth.login')->with('error', 'давай по новой миша');
        }
    }
}