<?php

namespace App\Services;

use App\Repositories\Eloquent\RetainerAgreementRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RetainerAgreementService
{
    protected $RetainerAgreementRepository;

    public function __construct(RetainerAgreementRepository $RetainerAgreementRepository)
    {
        $this->RetainerAgreementRepository = $RetainerAgreementRepository;
    }
    public function create(array $data)
    {
        try {
            unset($data['_token']);
            $data['employer_id'] = Auth::user()->id;
            $data['date'] = date('d-m-Y');
            $this->RetainerAgreementRepository->create($data);
            return ['status' => true, 'message' => "Retainer Sign Successfully!"];
        } catch (\Exception $th) {
            Log::error('Error in CompanyInformationService.getBYID() ' . $th->getLine() . ' ' . $th->getMessage());
        }
    }
    public function getById($id)
    {
        try {
            return $this->RetainerAgreementRepository->getById(['employer_id'=>$id]);
        } catch (\Exception $th) {
            Log::error('Error in CompanyInformationService.getBYID() ' . $th->getLine() . ' ' . $th->getMessage());
        }
    }
}
