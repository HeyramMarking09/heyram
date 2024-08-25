<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthController extends Controller
{
    public function login(){
        return view('Admin.login');
    }
    public function loginForm(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return ['status'=>true , 'message'=>'Login Successfuuly!'];
        }else{
            return ['status'=>false , 'message'=>'Invalid Credientials'];
        }
    }
    public function dashboard()
    {
        return view('Admin.dashboard');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
