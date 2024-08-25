<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LmiaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LmiaController extends Controller
{
    protected $LmiaService;
    public function __construct(LmiaService $LmiaService)
    {
        $this->LmiaService = $LmiaService; 
    }
    public function index()
    {
        return view('Admin.lmia');
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

}
