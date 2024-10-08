<?php

namespace App\Repositories\Contracts;

interface TaskManagementInterface
{
    public function create(array $data);
    public function getById(array $data);
}
