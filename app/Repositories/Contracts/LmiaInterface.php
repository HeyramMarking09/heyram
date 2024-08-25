<?php

namespace App\Repositories\Contracts;

interface LmiaInterface
{
    public function create(array $data);
    public function getById(array $data);
    public function getAll($sortOrder);
}
