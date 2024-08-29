<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\CompanyDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CompanyDocController extends Controller
{
    public function index()
    {
        return view('Employer.company-documents');
    }
    public function create(Request $request)
    {
        try {
            // Define the destination path
            $destinationPath = public_path('company_docs');

            // Check if the folder exists; if not, create it
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true); // Create the directory with appropriate permissions
            }
            if($request->hasFile('certificate_of_incorporation')){
                if ($request->file('certificate_of_incorporation')) {
                    $originalFileName  = $request->file('certificate_of_incorporation')->getClientOriginalName();
                    $fileName1 = time().'_1_'.$originalFileName;
                    $request->file('certificate_of_incorporation')->move($destinationPath, $fileName1);
                }
            }else{
                $fileName1 = null;
            }
            if($request->hasFile('valid_business_license')){
                if ($request->file('valid_business_license')) {
                    $originalFileName = $request->file('valid_business_license')->getClientOriginalName();
                    $fileName2 = time().'_2_'.$originalFileName;
                    $request->file('valid_business_license')->move($destinationPath, $fileName2);
                }
            }else{
                $fileName2 = null;
            }
            if ($request->hasFile('summary_of_company')) {
                if ($request->file('summary_of_company')) {
                    $originalFileName = $request->file('summary_of_company')->getClientOriginalName();
                    $fileName3 = time().'_3_'.$originalFileName;
                    $request->file('summary_of_company')->move($destinationPath, $fileName3);
                }
            }else{
                $fileName3 = null;
            }
            if ($request->hasFile('following_document_file_one')) {
                if ($request->file('following_document_file_one')) {
                    $originalFileName = $request->file('following_document_file_one')->getClientOriginalName();
                    $fileName5 = time().'_5_'.$originalFileName;
                    $request->file('following_document_file_one')->move($destinationPath, $fileName5);
                }
            }else{
                $fileName5 = null;
            }
            if ($request->hasFile('following_document_file_two')) {
                    if ($request->file('following_document_file_two')) {
                        $originalFileName = $request->file('following_document_file_two')->getClientOriginalName();
                        $fileName6 = time().'_6_'.$originalFileName;
                        $request->file('following_document_file_two')->move($destinationPath, $fileName6);
                    }
            }else{
                $fileName6 = null;
            }
            $dataCreate = [
                'following_document' => $request->following_document,
                'certificate_of_incorporation' => $fileName1,
                'valid_business_license' => $fileName2,
                'summary_of_company' => $fileName3,
                'following_document_file_one' => $fileName5,
                'following_document_file_two' => $fileName6,
                'employer_id' => Auth::user()->id,
            ];
            CompanyDoc::create($dataCreate);
            return ['status'=>true , 'message'=>'Company Docs Added Successfully!'];
        } catch (\Exception $th) {
            Log::error("Error in CompanyDocController.create() ". $th->getLine() .' '.$th->getMessage());
        }
    }
}
