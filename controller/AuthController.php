<?php

use Firebase\JWT\JWT;

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    public function registerForm()
    {
        require_once __DIR__ . '/../views/register.php';
    }

    public function register()
    {
        // Récupération des données
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $location = $_POST["location"];

        // Vérification des données
        // Tous les champs sont entrés
        if (empty($last_name)) {
            $this->returnWithError("/toutici/register", "-last_name", "Le nom est obligatoire.");
        }
        if (empty($first_name)) {
            $this->returnWithError("/toutici/register", "-first_name", "Le prénom est obligatoire.");
        }
        if (empty($email)) {
            $this->returnWithError("/toutici/register", "-email", "L'email est obligatoire.");
        }
        if (empty($phone)) {
            $this->returnWithError("/toutici/register", "-phone", "Le numéro de téléphone est obligatoire.");
        }
        if (empty($password)) {
            $this->returnWithError("/toutici/register", "-password", "Le mot de passe est obligatoire.");
        }

        // L'email est bien un email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->returnWithError("/toutici/register", "-email", "L'adresse email n'est pas valide.");
        }

        // Le numéro de téléphone est bien un numéro de téléphone
        if (!preg_match('/^\+?[0-9]{10,15}$/', $phone)) {
            $this->returnWithError("/toutici/register", "-phone", "Le numéro de téléphone n'est pas valide.");
        }

        $pattern = '/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[!@#$%^&(),.?":{}|<>])[A-Za-z\d!@#$%^&(),.?":{}|<>]{12,}$/';
        // Le mot de passe est valide
        if (preg_match($pattern, $password)) {
            $this->returnWithError("/toutici/register", "-password", "Le mot de passe doit contenir au moins 12 caractères, dont une lettre majuscule, une lette minuscule, un chiffre et un caractère spécial." . $password);
        }

        // Création du model
        $user = new User();

        // Ajout de l'utilisateur
        try {
            if($user->getUserByEmail($email)) {
                $this->returnWithError("/toutici/register", "-email", "L'email est déjà utilisé.");
            }

            $user->addUser($first_name, $last_name, $email, $phone, $password, $location);
            $_SESSION["message"] = "Utilisateur créé avec succès.";
            unset($_POST["password"]);
            header("Location: /toutici/");
            exit();
        } catch (Error $e) {
            $this->returnWithError("/toutici/register", "", "Unknown Error : " . $e->getMessage());
        }
    }

    public function loginForm()
    {
        require_once __DIR__ . '/../views/login.php';
    }

    public function login()
    {
        // Récupération des données
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Vérification des données
        // Tous les champs sont entrés
        if (empty($email)) {
            $this->returnWithError("/toutici/register", "-email", "L'email est obligatoire.");
        }
        if (empty($password)) {
            $this->returnWithError("/toutici/register", "-password", "Le mot de passe est obligatoire.");
        }


        // Création du model
        $user = new User();

        $user = $user->getUserByEmail($email);

        // Vérification de l'utilisateur
        if (!$user) {
            $this->returnWithError("/toutici/login", "-email", "L'utilisateur n'existe pas.");
        }

        if (password_verify($password, $user['password'])) {
            // TODO: Mise en place du Token JWT
            // Créer le payload pour le JWT
            // $payload = [
            //     'iss' => "http://localhost:3000/", // Émetteur
            //     'aud' => "http://localhost:3000/", // Audience
            //     'iat' => time(),                // Date de création
            //     'exp' => time() + 3600,         // Expiration (1 heure)
            //     'user_id' => $user['id'],       // ID utilisateur
            //     'user_email' => $user['email'],       // Email utilisateur
            //     'user_last_name' => $user['last_name'],   // Nom de famille utilisateur
            //     'user_first_name' => $user['first_name'],  // Prénom utilisateur
            //     'user_location' => $user['location'] ? $user['location'] : null,  // Localisation de l'utilisateur
            // ];

            // Générer le JWT
            // TODO: Utiliser une clé secrète plus sécurisée
            // $jwt = JWT::encode($payload, 'test', 'HS256');

            // Stocker le JWT dans un cookie (ou une autre méthode)
            // setcookie("auth_token", $jwt, time() + 3600, "/", "", false, true);

            // Redirection après la connexion
            // header("Location: /");
            // exit();

            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'last_name' => $user['last_name'],
                'first_name' => $user['first_name'],
                'location' => $user['location']
            ];

            header("Location: /toutici/");
        } else {
            $this->returnWithError("/toutici/login", "-password", "Le mot de passe n'est pas correct");
        }
    }

    private function returnWithError($location, $errorName, $errorMessage)
    {
        $_SESSION["error" . $errorName] = $errorMessage;
        $_SESSION['form_data'] = $_POST;
        header("Location:" . $location);
        exit();
    }
}