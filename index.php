<?php
// Inclure le fichier de configuration et les classes nécessaires
require_once 'config/database.php';
require_once 'router.php';

// Créez une instance du routeur
$router = new Router();

// Définir les routes
$router->get('/', 'HomeController@index');

// Lancer le routeur
$router->dispatch($_SERVER['REQUEST_URI']);
?>
