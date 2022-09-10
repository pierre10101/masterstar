<?php

namespace App\Contracts;

use App\Contracts\RepositoryProviderInterface;

interface RepositoryFactoryInterface
{
    /**
     * A method to make/retrieve the requested provider
     * 
     * @return RepositoryProviderInterface
     */
    public function make(string $type): RepositoryProviderInterface;
}
