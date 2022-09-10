<?php

namespace App\Contracts;

use App\Contracts\RepositoryProviderInterface;

interface RepositoryFactoryInterface {
    public function make(string $type): RepositoryProviderInterface;
}