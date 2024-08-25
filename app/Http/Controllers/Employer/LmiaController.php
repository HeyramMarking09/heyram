<?php

namespace App\Http\Controllers\Employer;

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
            $detail = $this->LmiaService->getByID($id);
            if(isset($detail) && !empty($detail)){
                return view('Employer.lmia-detail', compact('detail'));
            }
            return redirect()->back();
        } catch (\Exception $th) {
            Log::error('Error in LmiaController.lmiaDetail() '. $th->getLine() . ' ' .$th->getMessage());

        }
    }
}
