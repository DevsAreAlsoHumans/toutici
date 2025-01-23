<?php

namespace Application;

class Router
{
    private static $routes = [];
    private static $basePath = '/toutici'; // Set your base path here

    public static function addRoute($method, $path, $callback)
    {
        self::$routes[] = ['method' => $method, 'path' => $path, 'callback' => $callback];
        // Debug: Log the registered routes
        error_log("Route added: $method $path");
    }

    public static function dispatch($method, $path)
    {
        // Remove the base path from the requested URI
        if (strpos($path, self::$basePath) === 0) {
            $path = substr($path, strlen(self::$basePath));
        }

        // Debug: Log the requested method and path
        error_log("Dispatching: $method $path");

        foreach (self::$routes as $route) {
            $routePattern = self::convertPathToRegex($route['path']);

            if ($route['method'] === $method && preg_match($routePattern, $path, $matches)) {
                array_shift($matches);

                call_user_func_array($route['callback'], array_values($matches));
                return;
            }
        }

        echo "404 - Not Found";
    }

    private static function convertPathToRegex($path)
    {
        $path = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_-]+)', $path);

        $path = "~^$path$~";

        return $path;
    }

    public static function redirect($path)
    {
        $url = self::$basePath . $path;
        header("Location: $url");
        exit();
    }
}