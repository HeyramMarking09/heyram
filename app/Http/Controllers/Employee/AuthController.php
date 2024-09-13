<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        return view('Employee.login'); 
    }
    public function loginForm(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('employee')->attempt($credentials)) {
            return ['status'=>true , 'message'=>'Login Successfuuly!'];
        }else{
            return ['status'=>false , 'message'=>'Invalid Credientials'];
        }
    }
    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect()->route('employee.login');
    }
}
