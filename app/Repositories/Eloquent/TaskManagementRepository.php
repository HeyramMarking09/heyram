<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\TaskManagementInterface;
use App\Models\TaskManagement;

class TaskManagementRepository implements TaskManagementInterface
{
    protected $model;
    public function __construct(TaskManagement $model)
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
