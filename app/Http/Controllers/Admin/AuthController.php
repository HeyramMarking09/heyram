<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Services\FirebaseNotificationService;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected $FirebaseNotificationService;
    protected $UserService;
    public function __construct(FirebaseNotificationService $FirebaseNotificationService, UserService $UserService)
    {
        $this->FirebaseNotificationService = $FirebaseNotificationService;
        $this->UserService = $UserService;
    }
    public function login(){
        return view('Admin.login');
    }
    public function loginForm(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // Add a condition to check if the user is an admin
        $credentials['user_type'] = 'admin';
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
    
    public function saveToken(Request $request)
    {
        // Get the currently authenticated admin
        $admin = Auth::guard('admin')->user();
        if ($admin) {
            $admin->fcm_token = $request->input('token');
            $admin->save();
            return response()->json(['message' => 'FCM Token saved successfully.']);
        } else {
            return response()->json(['message' => 'Admin not authenticated.'], 401);
        }
    }
    public function sendNotification(Request $request)
    {
        $tokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();

        $title = 'Title hai!!!!';
        $body = 'Boidy hai!!!';

        $this->FirebaseNotificationService->sendNotification($title, $body, $tokens);
        return  redirect()->back();
    }
    public function usersSearch(Request $request)
    {
        return $this->UserService->usersSearch($request->all());
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
