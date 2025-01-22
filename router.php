<?php

class Router
{
    private $routes = [];

    public function get($path, $action)
    {
        $this->routes['GET'][$path] = $action;
    }

    public function post($path, $action)
    {
        $this->routes['POST'][$path] = $action;
    }

    public function dispatch($uri)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            $action = $this->routes[$method][$path];
            [$controller, $method] = explode('@', $action);

            $controllerFile = __DIR__ . '/controller/' . $controller . '.php';
            if (file_exists($controllerFile)) {
                require_once $controllerFile;

                $controllerClass = new $controller();
                if (method_exists($controllerClass, $method)) {
                    call_user_func([$controllerClass, $method]);
                } else {
                    echo "La méthode $method n'existe pas dans le contrôleur $controller.";
                }
            } else {
                echo "Le contrôleur $controller n'existe pas.";
            }
        } else {
            http_response_code(404);
            echo "Page non trouvée.";
        }
    }
}
?>
