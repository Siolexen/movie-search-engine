<?php

namespace Tests;

use App\MovieRecommender;
use App\MovieRepository;
use App\MoviesStartingWithWStrategy;
use App\MultiWordMoviesStrategy;
use App\RandomMoviesStrategy;
use PHPUnit\Framework\TestCase;

class MovieRecommendationTest extends TestCase
{
    public function testRandomMoviesStrategy()
    {
        $movies = [
            "Pulp Fiction",
            "Incepcja",
            "Skazani na Shawshank",
            "Dwunastu gniewnych ludzi",
            "Ojciec chrzestny",
            "Django",
            "Matrix",
            "Leon zawodowiec",
            "Siedem",
            "Nietykalni",
            "Władca Pierścieni: Powrót króla",
            "Fight Club",
            "Forrest Gump"
        ];

        $movieRepositoryMock = $this->createMock(MovieRepository::class);
        $movieRepositoryMock->method('getAllMovies')
            ->willReturn($movies);

        $movieRecommender = new MovieRecommender(new RandomMoviesStrategy(), $movieRepositoryMock);
        $recommendedMovies = $movieRecommender->recommendMovies();

        $this->assertCount(3, $recommendedMovies);
    }

    public function testMoviesStartingWithWStrategy()
    {
        $movies = [
            "Pulp Fiction",
            "Incepcja",
            "Skazani na Shawshank",
            "Dwunastu gniewnych ludzi",
            "Ojciec chrzestny",
            "Django",
            "Matrix",
            "Leon zawodowiec",
            "Siedem",
            "Nietykalni",
            "Władca Pierścieni: Powrót króla",
            "Fight Club",
            "Forrest Gump",
            "Wielki Gatsby",
            "Whiplash",
            "Wyspa tajemnic"
        ];

        $movieRepositoryMock = $this->createMock(MovieRepository::class);
        $movieRepositoryMock->method('getAllMovies')
            ->willReturn($movies);

        $movieRecommender = new MovieRecommender(new MoviesStartingWithWStrategy(), $movieRepositoryMock);
        $recommendedMovies = $movieRecommender->recommendMovies();

        foreach ($recommendedMovies as $movie) {
            $this->assertStringStartsWith('W', $movie);
        }
        $this->assertCount(3, $recommendedMovies);
    }

    public function testMultiWordMoviesStrategy()
    {
        $movies = [
            "Pulp Fiction",
            "Incepcja",
            "Skazani na Shawshank",
            "Dwunastu gniewnych ludzi",
            "Ojciec chrzestny",
            "Django",
            "Matrix",
            "Leon zawodowiec",
            "Siedem",
            "Nietykalni",
            "Władca Pierścieni: Powrót króla",
            "Fight Club",
            "Forrest Gump"
        ];

        $movieRepositoryMock = $this->createMock(MovieRepository::class);
        $movieRepositoryMock->method('getAllMovies')
            ->willReturn($movies);

        $movieRecommender = new MovieRecommender(new MultiWordMoviesStrategy(), $movieRepositoryMock);
        $recommendedMovies = $movieRecommender->recommendMovies();

        foreach ($recommendedMovies as $movie) {
            $this->assertGreaterThan(1, str_word_count($movie));
        }
        $this->assertCount(8, $recommendedMovies);
    }
}
