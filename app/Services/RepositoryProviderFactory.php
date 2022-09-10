<?php

namespace App\Services;

use App\Contracts\RepositoryProviderInterface;
use App\Contracts\RepositoryFactoryInterface;
use App\Services\GithubRepositoryProvider;
use App\Services\LocalProvider;
use Github\Client;

class RepositoryProviderFactory implements RepositoryFactoryInterface
{
    protected $resolve;

    function __construct()
    {   
        $this->resolve = [
            'github' => new GithubRepositoryProvider(new Client()),
            'local' => new LocalProvider()
        ];
    }
    public function make(string $type):RepositoryProviderInterface {
        if ($this->resolve[$type]) {
            return $this->resolve[$type];
        }
    }
}
