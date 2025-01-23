<?php

class Router
{
    private $routes = [];
    private $basePath;

    /**
     * Constructeur pour initialiser le basePath.
     */
    public function __construct($basePath = '')
    {
        $this->basePath = rtrim($basePath, '/');
    }

    /**
     * Enregistre une route GET.
     */
    public function get($path, $callback)
    {
        $this->routes['GET'][$this->basePath . $path] = $callback;
    }

    /**
     * Enregistre une route POST.
     */
    public function post($path, $callback)
    {
        $this->routes['POST'][$this->basePath . $path] = $callback;
    }

    /**
     * Gestion de la requête entrante.
     */
    public function dispatch($uri)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($uri, PHP_URL_PATH);

        // Supprime le basePath et normalise le chemin
        $path = str_replace($this->basePath, '', $path);
        $path = rtrim($path, '/'); // Enlève le slash final s'il y en a

        // Vérifie si la méthode est définie dans les routes
        if (!isset($this->routes[$method])) {
            http_response_code(405); // Méthode non autorisée
            echo "Méthode non autorisée.";
            return;
        }

        // Recherche des correspondances pour cette méthode
        foreach ($this->routes[$method] as $route => $callback) {
            // Création du pattern pour les routes dynamiques
            $routePattern = '#^' . str_replace(['{', '}'], ['(?P<', '>[^/]+)'], $route) . '$#';

            if (preg_match($routePattern, $path, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // Si le callback est un contrôleur, invoquez-le
                if (is_array($callback)) {
                    [$controller, $method] = $callback;
                    $controllerInstance = new $controller();
                    return call_user_func_array([$controllerInstance, $method], $params);
                }
                // Sinon, invoquez directement le callback
                elseif (is_callable($callback)) {
                    return call_user_func_array($callback, $params);
                }
            }
        }

        // Si aucune route ne correspond
        http_response_code(404);
        echo "Page non trouvée.";
    }
}
?>
