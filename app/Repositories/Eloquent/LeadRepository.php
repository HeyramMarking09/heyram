<?php

namespace App\Repositories\Eloquent;

use App\Models\Lead;
use App\Repositories\Contracts\LeadInterface;

class LeadRepository implements LeadInterface
{
    protected $model;
    public function __construct(Lead $model)
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
    public function get(array $whereBy)
    {
        return $this->model->where($whereBy)->get();
    }

}
