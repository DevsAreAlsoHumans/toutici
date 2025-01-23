<?php
// Inclure les fichiers nécessaires
require_once 'router.php'; 
require_once './controller/HomeController.php'; 
require_once './controller/AnnouncementController.php'; 
require_once './controller/SearchController.php'; 
require_once './controller/AuthController.php'; 
require_once './controller/UserController.php'; 
require_once './controller/PrivacyController.php';

// Créer une instance du routeur avec le chemin de base
$router = new Router('/toutici');

// Définir les routes
$router->get('/', [HomeController::class, 'index']); 
$router->get('/announcement/{id}', [AnnouncementController::class, 'show']);
$router->get('/announcement/create', [AnnouncementController::class, 'createForm']);
$router->post('/announcement/create', [AnnouncementController::class, 'create']);
$router->get('/search', [SearchController::class, 'index']);
$router->get('/register', [AuthController::class, 'registerForm']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/login', [AuthController::class, 'loginForm']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/user/{id}', [UserController::class, 'show']);
$router->get('/user/{id}/delete', [UserController::class, 'delete']);
$router->get('/user/{id}/edit', [UserController::class, 'editFormView']);
$router->post('/user/{id}/edit', [UserController::class, 'editForm']);
$router->get('/privacy_legacy', [PrivacyController::class, 'index']);

// Lancer le routeur
$router->dispatch($_SERVER['REQUEST_URI']);
?>
