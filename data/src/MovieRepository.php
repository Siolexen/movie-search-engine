<?php

namespace App;

class MovieRepository
{
    private string $pathToMovie = __DIR__ . '/../movies.php';

    public function getAllMovies(): ?array
    {
        if (is_file($this->pathToMovie)) {
            return include $this->pathToMovie;
        }
        return null;
    }
}
