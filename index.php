<?php
// Inclure le fichier de configuration et les classes nécessaires

use Application\Router;

require_once 'config/database.php';
require_once 'router.php';

// import controllers
require_once __DIR__ . '/controller/HomeController.php';
require_once __DIR__ . '/controller/AnnouncementController.php';
require_once __DIR__ . '/controller/SearchController.php';
require_once __DIR__ . '/controller/AuthController.php';
require_once __DIR__ . '/controller/UserController.php';
require_once __DIR__ . '/controller/PrivacyController.php';

// Démarrer la session
session_start();

$homeController = new HomeController();
$announcementController = new AnnouncementController();
$searchController = new SearchController();
$authController = new AuthController();
$userController = new UserController();
$privacyController = new PrivacyController();

// Définir les routes
Router::addRoute("GET", "/", [$homeController, "index"]);
Router::addRoute("GET", "/announcement/{id}", [$announcementController, "show"]);
Router::addRoute("GET", "/announcement/create", [$announcementController, "createForm"]);
Router::addRoute("POST", "/announcement/create", [$announcementController, "create"]);
Router::addRoute("GET", "/search", [$searchController, "index"]);
Router::addRoute("GET", "/register", [$authController, "registerForm"]);
Router::addRoute("POST", "/register", [$authController, "register"]);
Router::addRoute("GET", "/login", [$authController, "loginForm"]);
Router::addRoute("POST", "/login", [$authController, "login"]);
Router::addRoute("GET", "/user/{id}", [$userController, "show"]);
Router::addRoute("GET", "/user/{id}/delete", [$userController, "delete"]);
Router::addRoute("GET", "/user/{id}/edit", [$userController, "editFormView"]);
Router::addRoute("POST", "/user/{id}/edit", [$userController, "editForm"]);
Router::addRoute("GET", "/privacy_legacy", [$privacyController, "index"]);

$method = $_SERVER["REQUEST_METHOD"];
$path = $_SERVER["REQUEST_URI"];

Router::dispatch($method, $path);