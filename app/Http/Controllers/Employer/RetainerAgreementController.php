<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Services\RetainerAgreementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RetainerAgreementController extends Controller
{
    protected $RetainerAgreementService;
    public function __construct(RetainerAgreementService $RetainerAgreementService)
    {
        $this->RetainerAgreementService = $RetainerAgreementService;
    }
    public function retainerAgreement()
    {
        $users = Auth::user();
        $data = $this->RetainerAgreementService->getById($users->id);
        return view('Employer.retainer-agreement', compact('users','data'));
    }
    public function createRetainerAgreement(Request $request)
    {
        try {
            return $this->RetainerAgreementService->create($request->all());
        } catch (\Exception $th) {
            Log::error("Error in RetainerAgreementController.createRetainerAgreement() ". $th->getLine() .' '.$th->getMessage());
        }         
    }
}
