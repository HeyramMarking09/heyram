<?php

namespace App\Repositories\Eloquent;

use App\Models\RetainerAgreement;
use App\Repositories\Contracts\RetainerAgreementInterface;

class RetainerAgreementRepository implements RetainerAgreementInterface
{
    protected $model;

    public function __construct(RetainerAgreement $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function getById(array $data)
    {
        return $this->model->where($data)->first();
    }
}
