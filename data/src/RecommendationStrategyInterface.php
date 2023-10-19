<?php

namespace App;

interface RecommendationStrategyInterface
{
    /**
     * @param array $movies
     * @return array
     */
    public function recommend(array $movies): array;
}
