<?php

namespace App\Services;

use App\Repositories\Eloquent\CompanyInformationRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CompanyInformationService
{
    protected $CompanyInformationRepository;

    public function __construct(CompanyInformationRepository $CompanyInformationRepository)
    {
        $this->CompanyInformationRepository = $CompanyInformationRepository;
    }
    public function create(array $data)
    {
        try {
            if(!isset($data['name']) && is_null($data['name'])){
                return ['status'=>false , 'message'=>'Something went wrong!'];
            }
            $createData = [];
            if(isset($data['job_title_occupation']) && !is_null($data['job_title_occupation'][0])){
                $jobTitles = $data['job_title_occupation'];
                $workingStatus = [];
    
                foreach ($data as $key => $value) {
                    if (str_contains($key, 'is_the_person_currently_working_')) {
                        $workingStatus[] = $value;
                    }
                }
    
                foreach ($jobTitles as $index => $jobTitle) {
                    $createData[] = [
                        'job_title_occupation' => $jobTitle,
                        'is_the_person_currently_working' => $workingStatus[$index] ?? null,
                    ];
                }
            }else{
                $createData = null;
            }
            $confirmData = [
                'employer_id' => Auth::user()->id,
                'name' => $data['name'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'job_title' => $data['job_title'],
                'company_legel_name' => $data['company_legel_name'],
                'company_operating_name' => $data['company_operating_name'],
                'cra_business_number' => $data['cra_business_number'],
                'registered_business_address' => $data['registered_business_address'],
                'country' => $data['country'],
                'state' => $data['state'],
                'city' => $data['city'],
                'postal_code' => $data['postal_code'],
                'full_time' => $data['full_time'],
                'part_time' => $data['part_time'],
                'company_incorporation_date' => $data['company_incorporation_date'],
                'more_then_five_million' => $data['more_then_five_million'],
                'lmia_application_in_last_three_year' => $data['lmia_application_in_last_three_year'],
                'description' => $data['description'],
                'job_title_occupation' => isset($createData) && !is_null($createData) ? json_encode($createData) : null 
            ];
             $this->CompanyInformationRepository->create($confirmData);
             return ['status'=>true , 'message'=>'Company Information Created Successfully!'];
        } catch (\Exception $exception) {
            Log::error("Error in CompanyInformationService.create() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function getById()
    {
        try {
            return $this->CompanyInformationRepository->getById(['employer_id'=>Auth()->user()->id]);
        } catch (\Exception $th) {
            Log::error('Error in CompanyInformationService.getBYID() '. $th->getLine() .' '.$th->getMessage());
        }
    }
    public function getWhereById($id)
    {
        try {
            return $this->CompanyInformationRepository->getById(['employer_id'=>$id]);
        } catch (\Exception $th) {
            Log::error('Error in CompanyInformationService.getBYID() '. $th->getLine() .' '.$th->getMessage());
        }
    }
}
