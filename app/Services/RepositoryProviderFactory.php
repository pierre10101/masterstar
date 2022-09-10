<?php

namespace App\Services;

use App\Contracts\RepositoryProviderInterface;
use App\Contracts\RepositoryFactoryInterface;

use App\Services\GithubRepositoryProvider;
use App\Services\LocalProvider;

use Github\Client;

class RepositoryProviderFactory implements RepositoryFactoryInterface
{
    /**
     * A private array for storing all the possible providers
     * @var $resolve array
     */
    protected array $resolve;

    /**
     * Setup and resolve the providers with their aliases
     */
    function __construct()
    {
        $this->resolve = [
            'github' => new GithubRepositoryProvider(new Client()),
            'local' => new LocalProvider()
        ];
    }
    
    /**
     * A method to make/retrieve the requested provider
     * 
     * @return  RepositoryProviderInterface
     */
    public function make(string $type): RepositoryProviderInterface
    {
        if ($this->resolve[$type]) {
            return $this->resolve[$type];
        }
    }
}
