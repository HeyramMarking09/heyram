<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getAll($sortOrder);
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function destroy($id);
    public function delete(array $id);
}
