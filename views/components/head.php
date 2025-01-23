<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="/toutici/public/css/style.css">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css">
</head>
<?php
// TODO: Mise en place du Token JWT
// require_once __DIR__ . '/../../middleware/AuthMiddleware.php';

// Récupérer les informations de l'utilisateur
// $auth = new AuthMiddleware();
// $user = $auth->getUserFromToken();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>