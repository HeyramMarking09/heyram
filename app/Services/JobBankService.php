<?php

namespace App\Services;

use App\Repositories\Eloquent\JobBankRepository;
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
}
