<?php

namespace App\Repositories\Eloquent;

use App\Models\JobBank;
use App\Models\Lead;
use App\Repositories\Contracts\JobBankInterface;

class JobBankRepository implements JobBankInterface
{
    protected $model;
    public function __construct(JobBank $model)
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
    public function getAll($sortOrder)
    {
        return $this->model->orderBy('id', $sortOrder)->newQuery();
    }
    public function updateStatus(array $data)
    {
        return $this->model->where('id', $data['id'])->update(['status'=>$data['status']]);
    }
    public function update($id, array $data)
    {
        return $this->model->where('id', $id)->update($data);
    }
    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }

}
