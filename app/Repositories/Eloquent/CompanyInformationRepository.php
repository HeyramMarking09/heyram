<?php

namespace App\Repositories\Eloquent;

use App\Models\CompanyInformation;
use App\Repositories\Contracts\CompanyInformationRepositoryInterface;

class CompanyInformationRepository implements CompanyInformationRepositoryInterface
{
    protected $model;

    public function __construct(CompanyInformation $model)
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
