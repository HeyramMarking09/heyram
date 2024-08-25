<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    protected $UserService;
    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
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
}