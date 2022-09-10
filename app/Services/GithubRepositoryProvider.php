<?php

namespace App\Services;

use App\Contracts\RepositoryProviderInterface;
use Github\Client;

class GithubRepositoryProvider implements RepositoryProviderInterface
{
    protected $client;
    function __construct(Client $client)
    {
        $this->client = new $client();
    }

    public function getName(): string
    {
        // Implementation is pending
        return 'github';
    }

    public function getPopularRepositories(): array
    {
        // implementation is pending
        return  array_slice($this->client->api('search')->repositories("language:php", 'stars', 'desc')['items'],0,10);
    }
}