<?php

namespace App\Repositories\Contracts;

interface CompanyInformationRepositoryInterface
{
    public function create(array $data);
    public function getById(array $data);
}
