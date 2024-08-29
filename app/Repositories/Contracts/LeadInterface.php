<?php

namespace App\Repositories\Contracts;

interface LeadInterface
{
    public function create(array $data);
    public function getById(array $data);
    public function getAll($sortOrder);
}
