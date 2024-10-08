<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\TaskManagementService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskManagementController extends Controller
{
    protected $UserService;
    protected $TaskManagementService;
    public function __construct(UserService $UserService, TaskManagementService $TaskManagementService)
    {
        $this->UserService = $UserService;
        $this->TaskManagementService = $TaskManagementService;
    }
    public function index(Request $request){

        $employees = $this->UserService->getEmployees();
        return view('Admin.TaskManagement.index' , compact('employees'));
    }
    public function create(Request $request)
    {
        try {
            // Define the destination path
            $destinationPath = public_path('task-management');

            // Check if the folder exists; if not, create it
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true); // Create the directory with appropriate permissions
            }
            if ($request->hasFile('file_name')) {
                if ($request->file('file_name')) {
                    $originalFileName  = $request->file('file_name')->getClientOriginalName();
                    $fileName1 = time() . '_1_' . $originalFileName;
                    $request->file('file_name')->move($destinationPath, $fileName1);
                    $request['file'] = $fileName1;
                }
            } else {
                $fileName1 = null;
                $request['file'] = $fileName1;
            }
            return $this->TaskManagementService->create($request->all());
        } catch (\Exception $th) {
            return Log::error('Error in TaskManagementController.create() '.$th->getLine() .' '.$th->getMessage());
        }
    }
    public function getAll(Request $request)
    {
        return $this->TaskManagementService->getAll($request->all());
    }
    public function delete(Request $request)
    {
        return $this->TaskManagementService->deleteTask($request->all());
    }
    public function update(Request $request)
    {
        try {
            
            // Define the destination path
            $destinationPath = public_path('task-management');

            if ($request->hasFile('file_name')) {
                if ($request->file('file_name')) {
                    $originalFileName  = $request->file('file_name')->getClientOriginalName();
                    $fileName1 = time() . '_1_' . $originalFileName;
                    $request->file('file_name')->move($destinationPath, $fileName1);
                    $request['file'] = $fileName1;
                }
            }
            return $this->TaskManagementService->update($request->all());
        } catch (\Exception $th) {
            return Log::error('Error in TaskManagementController.update() '.$th->getLine() .' '.$th->getMessage());
        }
    }
}
