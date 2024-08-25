<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected $UserService;
    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
    }
    public function login(Request $request)
    {
        return view('Employer.login');
    }
    public function loginForm(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('employer')->attempt($credentials)) {
            return ['status' => true, 'message' => 'Login Successfuuly!'];
        } else {
            return ['status' => false, 'message' => 'Invalid Credientials'];
        }
    }

    public function dashboard()
    {
        $videoShow = Auth::user()->video_shows;
        return view('Employer.dashboard', compact('videoShow'));
    }
    public function logout()
    {
        Auth::guard('employer')->logout();
        return redirect()->route('employer.login');
    }
    public function changeVideoShowStatus()
    {
        try {
            return $this->UserService->changeVideoShowStatus();
        } catch (\Throwable $th) {
            Log::error('Error in AuthController.changeVideoShowStatus() '.$th->getLine().' '.$th->getMessage());
        }
    }
    public function howItWorks()
    {
        return view('Employer.how-it-works');
    }
    public function profile()
    {
        return view('Employer.profile');
    }
    public function changePassword()
    {
        return view('Employer.change-password');
    }
    public function changePasswordForm(Request $request)
    {
        try {
            return $this->UserService->changePassword($request->all());
        } catch (\Exception $th) {
            Log::error('Error in AuthController.changePasswordForm() '.$th->getLine().' '.$th->getMessage());
        }
    }
}
