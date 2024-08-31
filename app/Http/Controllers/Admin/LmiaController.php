<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LmiaService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LmiaController extends Controller
{
    protected $LmiaService;
    protected $UserService;
    public function __construct(LmiaService $LmiaService, UserService $UserService)
    {
        $this->LmiaService = $LmiaService; 
        $this->UserService = $UserService; 
    }
    public function index()
    {
        $UserData = $this->UserService->getEmployees();
        return view('Admin.lmia',compact('UserData'));
    }
    public function lmiaDetail($id)
    {
        try {
            $data = $this->LmiaService->lmiaDetail($id);
            if(!isset($data)){
                return redirect()->back();
            }else{
                $UserData = $this->UserService->getEmployees();
                return view('Admin.lmia-detail', compact('data', 'UserData'));
            }
        } catch (\Exception $th) {
            Log::error('Error in LmiaController.lmiaDetail() '. $th->getLine() . ' ' .$th->getMessage());
        }
    }
    public function applyForAnLmia()
    {
        $UserData = $this->UserService->getEmployers();
        return view('Admin.create-lmia', compact('UserData'));
    }
    public function getListOfLmias(Request $request)
    {
        try {
            $is_admin = true;
            return $this->LmiaService->getAll($request->all(),$is_admin);
        } catch (\Exception $th) {
            Log::error('Error in LmiaController.getLmiaList() '. $th->getLine() . ' ' .$th->getMessage());
        }
    }
    public function changeLmiaStatus(Request $request)
    {
        try {
            return $this->LmiaService->changeStatus($request->all());
        } catch (\Exception $th) {
            Log::error('Error in LmiaController.getLmiaList() '. $th->getLine() . ' ' .$th->getMessage());
        }
    }
    public function lmiaAssignEmployee(Request $request)
    {
        try {
            return $this->LmiaService->assignEmployee($request->all());
        } catch (\Exception $th) {
            Log::error('Error in LmiaController.lmiaAssignEmployee() '. $th->getLine() . ' ' .$th->getMessage());
        }
    }
    public function lmiaApproved(Request $request)
    {
        try {
            return $this->LmiaService->lmiaApproved($request->all());
        } catch (\Exception $th) {
            Log::error('Error in LmiaController.lmiaApproved() '. $th->getLine() . ' ' .$th->getMessage());
        }
    }
    public function lmiaInterviewSchedule(Request $request)
    {
        try {
            return $this->LmiaService->lmiaInterviewSchedule($request->all());
        } catch (\Exception $th) {
            Log::error('Error in LmiaController.lmiaInterviewSchedule() '. $th->getLine() . ' ' .$th->getMessage());
        }
    }
    public function lmiaForm(Request $request)
    {
        try {
            return $this->LmiaService->create($request->all());
        } catch (\Exception $th) {
            Log::error('Error in LmiaController.lmiaForm() '. $th->getLine() . ' ' .$th->getMessage());
        }
    }
}
