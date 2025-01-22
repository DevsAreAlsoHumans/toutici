<?php

class AuthController
{
    public function registerForm()
    {
        require_once __DIR__ . '/../views/register.php';
    }

    public function register()
    {
        // Logique pour enregistrer un nouvel utilisateur
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Exemple de logique pour enregistrer l'utilisateur
        // Vous pouvez remplacer ceci par une requête à votre base de données
        if ($username && $password) {
            // Simuler l'enregistrement et obtenir un ID utilisateur

            // Rediriger vers la page de connexion
            header("Location: /login");
            exit;
        } else {
            // Afficher un message d'erreur si les champs sont vides
            echo "Erreur lors de l'inscription. Veuillez remplir tous les champs.";
        }
    }

    public function loginForm()
    {
        require_once __DIR__ . '/../views/login.php';
    }

    public function login()
    {
        // Logique pour authentifier un utilisateur
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Exemple de logique pour authentifier l'utilisateur
        // Vous pouvez remplacer ceci par une requête à votre base de données
        if ($username === 'admin' && $password === 'password') {
            // Simuler une connexion réussie
            echo "Connexion réussie. Bienvenue, $username!";
        } else {
            // Afficher un message d'erreur si les informations d'identification sont incorrectes
            echo "Erreur lors de la connexion. Nom d'utilisateur ou mot de passe incorrect.";
        }
    }
}
?>