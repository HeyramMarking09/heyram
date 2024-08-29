<?php

namespace App\Repositories\Contracts;

interface JobBankInterface
{
    public function create(array $data);
    public function getById(array $data);
    public function getAll($sortOrder);
}
