<?php

namespace App;

class MultiWordMoviesStrategy implements RecommendationStrategyInterface
{
    public function recommend(array $movies): array
    {
        $result = [];
        foreach ($movies as $movie) {
            if (str_contains($movie, ' ')) {
                $result[] = $movie;
            }
        }
        return $result;
    }
}
