<?php

namespace App\Repositories\Eloquent;

use App\Models\Lmia;
use App\Repositories\Contracts\LmiaInterface;

class LmiaRepository implements LmiaInterface
{
    protected $model;
    public function __construct(Lmia $model)
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
}
