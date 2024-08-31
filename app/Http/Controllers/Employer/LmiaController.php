<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Services\LmiaService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LmiaController extends Controller
{
    protected $LmiaService;
    protected $UserService;
    public function __construct(LmiaService $LmiaService,UserService $UserService)
    {
        $this->LmiaService = $LmiaService;
        $this->UserService = $UserService;
    }
    public function index()
    {
        return view('Employer.lmia');
    }
    public function lmiaListShow()
    {
        return view('Employer.lmia-list');
    }
    public function lmiaForm(Request $request)
    {
        try {
            return $this->LmiaService->create($request->all());
        } catch (\Exception $th) {
            Log::error('Error in LmiaController.lmiaForm() '. $th->getLine() . ' ' .$th->getMessage());
        }
    }
    public function getLmiaList(Request $request)
    {
        try {
            $is_admin = false;
            return $this->LmiaService->getAll($request->all(),$is_admin);
        } catch (\Exception $th) {
            Log::error('Error in LmiaController.getLmiaList() '. $th->getLine() . ' ' .$th->getMessage());
        }
    }
    public function lmiaDetail($id)
    {
        try {
            $data = $this->LmiaService->getByID($id);
            if(isset($data) && !empty($data)){
                $UserData = $this->UserService->getEmployees();
                return view('Employer.lmia-detail', compact('data','UserData'));
            }
            return redirect()->back();
        } catch (\Exception $th) {
            Log::error('Error in LmiaController.lmiaDetail() '. $th->getLine() . ' ' .$th->getMessage());

        }
    }
}
