<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class SupportController extends Controller
{
    protected $SupportService;
    public function __construct(SupportService $SupportService)
    {
        $this->SupportService = $SupportService;
    }
    public function index(){
        $data = $this->SupportService->getALL();
        return view('Employer.support', compact('data'));
    }
    public function create(Request $request)
    {
        try {
            return $this->SupportService->create($request->all());
        } catch (\Exception $th) {
            Log::error('Error in SupportCobntroller.create() '. $th->getLine() .' '.$th->getMessage());
        }
    }
    public function getIndex()
    {
        if (Gate::allows('access-permission', ['Support', 'view'])) {
            $data = $this->SupportService->getALLForAdmin();
            return view('Admin.support', compact('data'));
        }else{
            abort(403, 'Unauthorized action.');
        }
    }
    public function addAnswer(Request $request)
    {
        try {
            return $this->SupportService->addAnswer($request->all());
        } catch (\Exception $th) {
            Log::error('Error in SupportCobntroller.addAnswer() '. $th->getLine() .' '.$th->getMessage());
        }
    }
}
