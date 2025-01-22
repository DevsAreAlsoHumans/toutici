<?php
// Inclure le fichier de configuration et les classes nécessaires
require_once 'config/database.php';
require_once 'router.php';

// Créez une instance du routeur
$router = new Router();

// Définir les routes
$router->get('/', 'HomeController@index');
$router->get('/announcement/{id}', 'AnnouncementController@show');
$router->get('/announcement/create', 'AnnouncementController@createForm');
$router->post('/announcement/create', 'AnnouncementController@create');
$router->get('/search', 'SearchController@index');
$router->get('/register', 'AuthController@registerForm');
$router->post('/register', 'AuthController@register');
$router->get('/login', 'AuthController@loginForm');
$router->post('/login', 'AuthController@login');

// Lancer le routeur
$router->dispatch($_SERVER['REQUEST_URI']);
?>