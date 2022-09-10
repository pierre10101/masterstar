<?php

namespace App\Services;

use App\Contracts\RepositoryProviderInterface;

use Github\Client;

class GithubRepositoryProvider implements RepositoryProviderInterface
{
    /**
     * A client that implements the github client interface
     * 
     * @var $client Client
     */
    protected Client $client;

    /**
     * A constructor that accepts a dependency of the Github Client Interface
     * 
     * @var Client
     * 
     */
    function __construct(Client $client)
    {
        $this->client = new $client();
    }

    /**
     * A method to retrieve the name of the provider
     * 
     * @return string
     */
    public function getName(): string
    {
        return 'github';
    }
    
    /**
     * A method to retrieve the 10 most popular repositories by stars
     * 
     * @return array
     */
    public function getPopularRepositories(): array
    {
        return  array_slice($this->client->api('search')->repositories("language:php", 'stars', 'desc')['items'], 0, 10);
    }
}
