<?php

namespace App;

class MovieRecommender
{
    private RecommendationStrategyInterface $strategy;
    private MovieRepository $movieRepository;

    public function __construct(RecommendationStrategyInterface $strategy, MovieRepository $movieRepository)
    {
        $this->strategy = $strategy;
        $this->movieRepository = $movieRepository;
    }

    /**
     * @param RecommendationStrategyInterface $strategy
     * @return void
     */
    public function setStrategy(RecommendationStrategyInterface $strategy): void
    {
        $this->strategy = $strategy;
    }

    /**
     * @return array
     */
    public function recommendMovies(): array
    {
        $movies = $this->movieRepository->getAllMovies();
        return $this->strategy->recommend($movies);
    }
}
