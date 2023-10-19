<?php

namespace App;

class MovieController
{
    private MovieRecommender $movieRecommender;

    public function __construct(MovieRecommender $movieRecommender)
    {
        $this->movieRecommender = $movieRecommender;
    }

    public function handleRequest(array $params): array
    {
        $strategy = $params['strategy'] ?? 'random';
        switch ($strategy) {
            case 'starting_with_w':
                $this->movieRecommender->setStrategy(new MoviesStartingWithWStrategy());
                break;
            case 'multi_word':
                $this->movieRecommender->setStrategy(new MultiWordMoviesStrategy());
                break;
            default:
                $this->movieRecommender->setStrategy(new RandomMoviesStrategy());
        }

        return $this->movieRecommender->recommendMovies();
    }
}
