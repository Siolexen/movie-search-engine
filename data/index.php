<?php

use App\MovieController;
use App\MovieRecommender;
use App\MovieRepository;
use App\RandomMoviesStrategy;
use App\Router;

require_once __DIR__ . '/vendor/autoload.php';

$movieRepository = new MovieRepository();
$movieRecommender = new MovieRecommender(new RandomMoviesStrategy(), $movieRepository);
$movieController = new MovieController($movieRecommender);

$router = new Router();

$router->addRoute('/movies', function () use ($movieController) {
    $params = array(
        'page' => $_GET['page'] ?? 1,
        'strategy' => $_GET['strategy'] ?? 'random'
    );
    $result = $movieController->handleRequest($params);
    echo json_encode($result);
});

$path = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';

$router->handleRequest($path);
