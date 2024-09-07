<?php

namespace App\Repositories\Eloquent;

use App\Models\CallTagging;
use App\Repositories\Contracts\CallTaggingInterface;

class CallTaggingRepository implements CallTaggingInterface
{
    protected $model;
    public function __construct(CallTagging $model)
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
    public function delete(array $data)
    {
        return $this->model->where($data)->delete();
    }
}
