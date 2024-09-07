<?php

namespace App\Repositories\Contracts;

interface CallTaggingInterface
{
    public function create(array $data);
    public function getById(array $data);
}
