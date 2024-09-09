<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Services\JobBankService;
use App\Services\LmiaService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected $UserService;
    protected $LmiaService;
    protected $JobBankService;
    public function __construct(UserService $UserService, LmiaService $LmiaService,JobBankService $JobBankService)
    {
        $this->UserService = $UserService;
        $this->LmiaService = $LmiaService;
        $this->JobBankService = $JobBankService;
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
        $userDetail = $this->UserService->userDetail(Auth::user()->id,Auth::user()->user_type );
      // Check if each property is null and log the result
        if(is_null($userDetail->companyInformation)){
            session()->flash('need_to_add', 'Need To Add Company Information!');
        }else if(is_null($userDetail->companyDoc)){
            session()->flash('need_to_add', 'Need To Add Company Docs!');
        }else if(is_null($userDetail->retainerAgreements)){
            session()->flash('need_to_add', 'Need To Add Retainer Agreement!');
        }else if(!empty($userDetail->AdditionalDocument) && isset($userDetail->AdditionalDocument)){
            foreach($userDetail->AdditionalDocument as $item){
                if(is_null($item->docs_file)){
                    session()->flash('need_to_add', 'Please Provide, Additional Documents!');
                }
            }
        }
        $pendingLmias = $this->LmiaService->AllLmiaWithStatus('0');
        $totalLmias = $this->LmiaService->AllLmiaWithStatus('100');
        $totalJobs = $this->JobBankService->get();
        return view('Employer.dashboard', compact('videoShow', 'pendingLmias', 'totalLmias', 'totalJobs'));
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
