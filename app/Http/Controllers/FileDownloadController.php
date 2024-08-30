<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FileDownloadController extends Controller
{
    protected $UserService;
    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
    }
    public function download($filename)
    {
        // Define the path to the folder where your files are stored
        $filePath = public_path('company_docs/' . $filename);

        $filePath_second = public_path('required_docs/' . $filename);
        // Check if the file exists
        if (file_exists($filePath)) {
            // Return the download response
            return response()->download($filePath);
        }else if (file_exists($filePath_second)) {
            // Return the download response
            return response()->download($filePath_second);
        } else {
            // If the file does not exist, show an error message
            return redirect()->back()->with('error', 'File not found.');
        }
    }
    public function downloadFileCompanyInformation($type, Request $request)
    {
        $fileName = time() . '_company_information.' . $type;
        $mimeType = $type === 'csv' ? 'text/csv' : ($type === 'pdf' ? 'application/pdf' : 'application/octet-stream');

        $callback = function () use ($request) {
            $handle = fopen('php://output', 'w');

            // Fetch dynamic data from the database
            $user = $this->UserService->userDetail($request->id, 'employer');
            if ($user) {
                $Country = Country::where('id',$user->companyInformation->country)->first();
                // Write header row
                fputcsv($handle, ['ID', 'First Name', 'Last Name', 'Email', 'Phone', 'Job Title', 'Company Name', 'Company Operating Name', 'CRA Business Number', 'Registered Business Address', 'Country', 'State', 'City', 'Postal Code', 'Company Incorporation Date', 'Description']);

                // Write dynamic data rows
                fputcsv($handle, [1, $user->companyInformation->name, $user->companyInformation->last_name, $user->companyInformation->email, $user->companyInformation->phone, $user->companyInformation->job_title, $user->companyInformation->company_legel_name, $user->companyInformation->company_operating_name, $user->companyInformation->cra_business_number, $user->companyInformation->registered_business_address,$Country->name,$user->companyInformation->state, $user->companyInformation->city, $user->companyInformation->postal_code, $user->companyInformation->company_incorporation_date, $user->companyInformation->description]);
            } else {
                // Handle the case where no user is found
                Log::warning('No user data found for the provided ID: ' . $request->id);
                fputcsv($handle, ['ID', 'Name', 'Email', 'Phone']); // Write headers even if no data
            }

            fclose($handle);
        };

        // Return a stream response for large files
        return response()->stream($callback, 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
    public function downloadFileRetainerAgreement($type, Request $request)
    {
        $fileName = time() . '_retainer_agreement.' . $type;
        $mimeType = $type === 'csv' ? 'text/csv' : ($type === 'pdf' ? 'application/pdf' : 'application/octet-stream');

        $callback = function () use ($request) {
            $handle = fopen('php://output', 'w');

            // Fetch dynamic data from the database
            $user = $this->UserService->userDetail($request->id, 'employer');
            if ($user) {
                // Write header row
                fputcsv($handle, ['ID', 'First Name', 'Last Name', 'Email', "Phone", 'First Name', 'Second Name', 'Third Name', 'Signature']);

                // Write dynamic data rows
                fputcsv($handle, [1, $user->name, $user->last_name, $user->email, $user->phone, $user->retainerAgreements->name_first,$user->retainerAgreements->second_name, $user->retainerAgreements->third_name , $user->retainerAgreements->client_signature]);
            } else {
                // Handle the case where no user is found
                Log::warning('No user data found for the provided ID: ' . $request->id);
                fputcsv($handle, ['ID', 'Name', 'Email', 'Phone']); // Write headers even if no data
            }

            fclose($handle);
        };

        // Return a stream response for large files
        return response()->stream($callback, 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
}
