<?php

namespace App\Contracts;

interface RepositoryProviderInterface
{
    /**
     * Return the name of the repository.
     *
     * @return string
     */

    public function getName(): string;

    /**
     * Return the most popular PHP repositories.
     *
     * @return array
     */
    public function getPopularRepositories(): array;
}
