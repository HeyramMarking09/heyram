<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\JobBankService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JobBankController extends Controller
{
    protected $JobBankService;
    public function __construct(JobBankService $JobBankService)
    {
        $this->JobBankService = $JobBankService;
    }
    public function create(Request $request)
    {
        try {
            return $this->JobBankService->create($request->all());
        } catch (\Exception $th) {
            Log::error("Error In JobBankController.create() ". $th->getLine() .' '.$th->getMessage());
        }
    }
}
