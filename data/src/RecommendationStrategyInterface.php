<?php

namespace App;

interface RecommendationStrategyInterface
{
    public function recommend(array $movies): array;
}
