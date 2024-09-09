<?php

namespace App\Services;

use App\Repositories\Eloquent\JobBankRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class JobBankService
{
    protected $JobBankRepository;

    public function __construct(JobBankRepository $JobBankRepository)
    {
        $this->JobBankRepository = $JobBankRepository;
    }
    public function create(array $data)
    {
        try {
            unset($data['_token']);
            $data['number_of_vacancies'] = $data['number_of_vacancies']??0;
            $data['bank_job_ad_number'] = $data['bank_job_ad_number']??0;
            $this->JobBankRepository->create($data);
            return ['status' => true, 'message' => "Job Bank Created Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in JobBankService.create() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function delete(array $data)
    {
        try {
            $check = $this->JobBankRepository->getById(['id'=> $data['id']]);
            if(!isset($check))
            {
                return ['status' => false, 'message' => "Something went wrong!"];
            }
            $this->JobBankRepository->delete($data['id']);
            return ['status' => true, 'message' => "Job Bank Deleted Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in JobBankService.delete() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function update(array $data)
    {
        try {
            $check = $this->JobBankRepository->getById(['id'=> $data['id']]);
            if(!isset($check))
            {
                return ['status' => false, 'message' => "Something went wrong!"];
            }
            unset($data['_token']);
            $data['number_of_vacancies'] = $data['number_of_vacancies']??0;
            $data['bank_job_ad_number'] = $data['bank_job_ad_number']??0;
            $this->JobBankRepository->update(['id'=>$data['id']],$data);
            return ['status' => true, 'message' => "Job Bank Updated Successfully!"];
        } catch (\Exception $exception) {
            Log::error("Error in JobBankService.create() " . $exception->getLine() . ' ' . $exception->getMessage());
        }
    }
    public function get()
    {
        try {
            return $this->JobBankRepository->get(['employer_id'=>Auth::user()->id]);
        } catch (\Exception $th) {
            Log::error('Error in jobbankservice.get() '. $th->getLine() .' '.$th->getMessage());
        }
    }
}
