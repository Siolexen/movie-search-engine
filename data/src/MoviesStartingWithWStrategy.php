<?php

namespace App;

class MoviesStartingWithWStrategy implements RecommendationStrategyInterface
{
    /**
     * @param array $movies
     * @return array
     */
    public function recommend(array $movies): array
    {
        $result = [];
        foreach ($movies as $movie) {
            if (str_starts_with($movie, 'W') && strlen(str_replace(' ', '', $movie)) % 2 == 0) {
                $result[] = $movie;
            }
        }
        return $result;
    }
}
