<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\CompanyInformationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanyInformationController extends Controller
{
    protected $CompanyInformationService;
    public function __construct(CompanyInformationService $CompanyInformationService)
    {
        $this->CompanyInformationService = $CompanyInformationService;
    }
    public function index()
    {
        $countries = Country::where('status',0)->get();        
        $companyInformation = $this->CompanyInformationService->getById();
        return view('Employer.company-information',compact('countries','companyInformation'));
    }
    public function createCompanyInformation(Request $request)
    {
        try {
            return $this->CompanyInformationService->create($request->all());
        } catch (\Exception $th) {
            Log::error("Error in ComapnyInformationController.createCompanyInformation() ". $th->getLine() .' '.$th->getMessage());
        }
    }
    public function companyDocuments()
    {
        return view('Employer.company-documents');
    }
    public function createCompanyDocs(Request $request)
    {
        try {
            dd($request->all());
            return $this->CompanyInformationService->create($request->all());
        } catch (\Exception $th) {
            Log::error("Error in ComapnyInformationController.createCompanyDocs() ". $th->getLine() .' '.$th->getMessage());
        }
    }
}
