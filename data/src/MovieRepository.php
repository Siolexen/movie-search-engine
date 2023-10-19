<?php

namespace App;

class MovieRepository
{
    private array $movies;
    private int $perPage;

    private string $pathToMovie = __DIR__ . '/../movies.php';

    public function __construct($perPage = 5)
    {
        $this->movies = $this->getAllMovies();
        $this->perPage = $perPage;
    }

    public function getAllMovies(): ?array
    {
        if (is_file($this->pathToMovie)) {
            return include $this->pathToMovie;
        }
        return null;
    }
}
