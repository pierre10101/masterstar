<?php

namespace App\Services;

use App\Contracts\RepositoryProviderInterface;

class LocalProvider implements RepositoryProviderInterface
{
    /**
     * Method to retrieving provider name
     * 
     * @return string
     */
    public function getName(): string
    {
        return 'local';
    }
    
    /**
     * Method for retrieve most popular repositories
     * 
     * @return array
     */
    public function getPopularRepositories(): array
    {
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
