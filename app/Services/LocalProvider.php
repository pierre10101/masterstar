<?php

namespace App\Services;

use App\Contracts\RepositoryProviderInterface;

class LocalProvider implements RepositoryProviderInterface
{

    public function getName(): string
    {
        // Implementation is pending
        return 'local';
    }

    public function getPopularRepositories(): array
    {
        // implementation is pending
        return [
            [
                'name' => 'masterstart/coding-tests',
                'url' => 'https://github.com/masterstart/coding-tests',
                'description' => 'A collection of MasterStart interview tests',
                'stars' => 0,
            ]
        ];
    }
}
