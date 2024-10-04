<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll($sortOrder)
    {
        return $this->model->orderBy('id',$sortOrder)->newQuery();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // public function update($id, array $data)
    // {
    //     return $this->model->where('id', $id)->update($data);
    // }
    public function update($id, array $data)
    {
        $model = $this->model->find($id['id']);
        if (!$model) {
            return false; // Handle the case where the model is not found
        }

        $model->fill($data);
        $model->save(); // This will trigger the `updated` event

        return true;
    }

    public function destroy($id)
    {
        // Retrieve the model instance, including soft-deleted ones
        $model = $this->model->withTrashed()->find($id);

        if ($model) {
            // Permanently delete the model instance
            return $model->forceDelete();
        }
        return false; // or throw an exception if the model is not found
    }
    public function delete(array $id)
    {
        return $this->model->where($id)->delete();
    }
    public function getByWhere($whereBy)
    {
        return $this->model->where($whereBy)->first();
    }
    public function getByWhereTrashed($whereBy)
    {
        return $this->model->withTrashed()->where($whereBy)->first();
    }
    public function getEmployees($whereBy){
        return $this->model->where($whereBy)->get();
    }
    public function usersSearch($whereBy){
        return $this->model->where('id', '!=', $whereBy)->get();
    }
    public function getAllDataOFFirst($whereBy)
    {
        return $this->model->with('companyInformation','retainerAgreements','lmias','companyDoc', 'jobBank','AdditionalDocument')->where($whereBy)->first();
    }
}
