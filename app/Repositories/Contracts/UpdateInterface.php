<?php

namespace App\Repositories\Contracts;

interface UpdateInterface
{
    public function create(array $data);
    public function getById(array $data);
}
