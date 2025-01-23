<?php

class Router
{
    private $routes = []; // Tableau pour stocker les routes

    // Méthode pour ajouter une route GET
    public function get($path, $action)
    {
        $this->routes['GET'][$path] = $action;
    }

    // Méthode pour ajouter une route POST
    public function post($path, $action)
    {
        $this->routes['POST'][$path] = $action;
    }

    // Méthode pour dispatcher la requête vers le bon contrôleur et méthode
    public function dispatch($uri)
    {
        $method = $_SERVER['REQUEST_METHOD']; // Récupère la méthode HTTP (GET, POST, etc.)
        $path = parse_url($uri, PHP_URL_PATH); // Récupère le chemin de l'URI

        // Vérifie si la route existe pour la méthode et le chemin donnés
        foreach ($this->routes[$method] as $route => $action) {
            $routePattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);
            if (preg_match('#^' . $routePattern . '$#', $path, $matches) || $routePattern) {
                array_shift($matches); // Supprime le premier élément qui est l'URL complète
                $action = $this->routes[$method][$route]; // Récupère l'action associée à la route
                [$controller, $method] = explode('@', $action); // Sépare le contrôleur et la méthode

                $controllerFile = __DIR__ . '/controller/' . $controller . '.php'; // Chemin vers le fichier du contrôleur
                if (file_exists($controllerFile)) {
                    require_once $controllerFile; // Inclut le fichier du contrôleur

                    $controllerClass = new $controller(); // Instancie le contrôleur
                    if (method_exists($controllerClass, $method)) {
                        call_user_func_array([$controllerClass, $method], $matches); // Appelle la méthode du contrôleur avec les paramètres
                    } else {
                        echo "La méthode $method n'existe pas dans le contrôleur $controller."; // Erreur si la méthode n'existe pas
                    }
                } else {
                    echo "Le contrôleur $controller n'existe pas."; // Erreur si le contrôleur n'existe pas
                }
                return;
            }
        }

        http_response_code(404); // Renvoie une erreur 404 si la route n'existe pas
        echo "Page non trouvée.";
    }
}
?>