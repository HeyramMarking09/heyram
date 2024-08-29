<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Services\CompanyInformationService;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    protected $UserService;
    protected $CompanyInformationService;
    public function __construct(UserService $UserService, CompanyInformationService $CompanyInformationService)
    {
        $this->UserService = $UserService;
        $this->CompanyInformationService = $CompanyInformationService;
    }
    public function index()
    {
        return view('Admin.manage-users');
    }
    public function createUser(Request $request)
    {
        try {
            unset($request['repeat_password']);
            return $this->UserService->createUser($request->all());
        } catch (\Exception $exception) {
            Log::error("Error in ManageUserController.createUser()" . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function getManageUsers(Request $request)
    {
        try {
            return $this->UserService->getManageUsers($request->all());
        } catch (\Exception $exception) {
            Log::error("Error in ManageUserController.getManageUsers()" . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function deleteUser(Request $request)
    {
        try {
            return $this->UserService->deleteUser($request->all());
        } catch (\Exception $exception) {
            Log::error("Error in ManageUserController.deleteUser()" . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function recoverDeleteRequest(Request $request)
    {
        try {
            return $this->UserService->recoverUser($request->all());
        } catch (\Exception $exception) {
            Log::error("Error in ManageUserController.deleteUser()" . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function deleteRequest()
    {
        return view('Admin.delete-request');
    }
    public function getDeleteRequest(Request $request)
    {
        try {
            return $this->UserService->getDeleteRequest($request->all());
        } catch (\Exception $exception) {
            Log::error("Error in ManageUserController.getDeleteRequest()" . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function updateUser(Request $request)
    {
        try {
            return $this->UserService->updateUser($request->all());
        } catch (\Exception $exception) {
            Log::error("Error in ManageUserController.updateUser()" . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function permanentDeleteRequest(Request $request)
    {
        try {
            return $this->UserService->permanentDeleteRequest($request->all());
        } catch (\Exception $exception) {
            Log::error("Error in ManageUserController.permanentDeleteRequest()" . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function employerDashboard()
    {
        return view('Admin.employer-dashboard');
    }
    public function employers(Request $request)
    {
        try {
            $request['user_type_get'] = 'employer';
            return $this->UserService->getManageUsers($request->all());
        } catch (\Exception $exception) {
            Log::error("Error in ManageUserController.employers()" . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function employerDetail($id)
    {
        try {
            $user_type = 'employer';
            $data = $this->UserService->userDetail($id, $user_type);
            $countries = Country::get();
            if(isset($data)){
                return view('Admin.user-detail',compact('data','countries'));
            }
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error("Error in ManageUserController.employers()" . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
}