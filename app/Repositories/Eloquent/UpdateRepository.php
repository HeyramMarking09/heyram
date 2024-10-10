<?php

namespace App\Repositories\Eloquent;

use App\Models\Update;
use App\Repositories\Contracts\UpdateInterface;

class UpdateRepository implements UpdateInterface
{
    protected $model;
    public function __construct(Update $model)
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
    public function update(array $whereBy , array $data)
    {
        return $this->model->where($whereBy)->update($data);
    }
}
