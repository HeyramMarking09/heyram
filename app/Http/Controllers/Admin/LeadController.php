<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Services\LeadService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class LeadController extends Controller
{
    protected $UserService;
    protected $LeadService;
    public function __construct(UserService $UserService, LeadService $LeadService)
    {
        $this->UserService = $UserService;
        $this->LeadService = $LeadService;
    }
    public function index()
    {
        if (Gate::allows('access-permission', ['Leads', 'view'])) {
            $users = $this->UserService->getEmployees();
            $counties = Country::all();
            return view('Admin.leads',compact('users', 'counties'));
        }else{
            abort(403, 'Unauthorized action.');
        }
        
    }
    public function createLead(Request $request)
    {
        try {
            return $this->LeadService->create($request->all());
        } catch (\Exception $th) {
            Log::error("Error in LeadController.createLead() ". $th->getLine() .' '.$th->getMessage());
        }
    }
    public function editLead(Request $request)
    {
        try {
            return $this->LeadService->update($request->all());
        } catch (\Exception $th) {
            Log::error("Error in LeadController.editLead() ". $th->getLine() .' '.$th->getMessage());
        }
    }
    public function getAll(Request $request)
    {
        try {
            return $this->LeadService->getAll($request->all());
        } catch (\Exception $th) {
            Log::error("Error in LeadController.getAll() ". $th->getLine() .' '.$th->getMessage());
        }
    }
    public function deleteLead(Request $request)
    {
        try {
            return $this->LeadService->deleteLead($request->all());
        } catch (\Exception $th) {
            Log::error("Error in LeadController.deleteLead() ". $th->getLine() .' '.$th->getMessage());
        }
    }
    public function getCallLeads(Request $request)
    {
        try {
            return $this->LeadService->get($request->all());
        } catch (\Exception $th) {
            Log::error("Error in LeadController.getCallLeads() ". $th->getLine() .' '.$th->getMessage());
        }
    }
}
