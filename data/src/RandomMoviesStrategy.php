<?php

namespace App;

class RandomMoviesStrategy implements RecommendationStrategyInterface
{
    public function recommend(array $movies): array
    {
        shuffle($movies);
        return array_slice($movies, 0, 3);
    }
}
