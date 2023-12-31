<?php

namespace App;

class Router
{
    private array $routes = [];

    /**
     * @param $path
     * @param $callback
     * @return void
     */
    public function addRoute($path, $callback): void
    {
        $this->routes[$path] = $callback;
    }

    /**
     * @param $path
     * @return void
     */
    public function handleRequest($path): void
    {
        if (array_key_exists($path, $this->routes)) {
            $callback = $this->routes[$path];
            if (is_callable($callback)) {
                call_user_func($callback);
            } else {
                echo "Error: Callback not callable.";
            }
        } else {
            http_response_code(404);
            echo "Error 404: Page not found.";
        }
    }
}
