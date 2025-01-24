<?php

require_once __DIR__ . '/../models/Announcement.php';
require_once __DIR__ . '/../models/User.php';

class UserController
{
    public function show($id)
    {
        // Logique pour récupérer l'utilisateur avec l'ID donné
        $user = $this->getUserById($id);

        $announcements = new Announcement();
        $announcements = $announcements->getAnnouncementsByUserId($id);

        if ($user) {
            // Inclure la vue pour afficher l'utilisateur
            require_once __DIR__ . '/../views/user.php';
        } else {
            // Rediriger vers la page 404 si l'utilisateur n'existe pas
            http_response_code(404);
            require_once __DIR__ . '/../views/404.php';
        }
    }

    private function getUserById($id)
    {
        $user = new User();
        return $user->getUserById($id);
    }

    public function delete($id)
    {
        // Logique pour supprimer l'utilisateur avec l'ID donné
        $user = new User();
        $user->deleteUser($id);
        session_destroy();

        // Rediriger vers la page d'accueil
        header('Location: /toutici/');
    }

    public function editForm($id)
    {
        // Logique pour récupérer l'utilisateur avec l'ID donné
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $location = $_POST["location"];

        $user = new User();

        if (empty($last_name)) {
            $this->returnWithError("/toutici/user/".$id."/edit", "-last_name", "Le nom est obligatoire.");
        }
        if (empty($first_name)) {
            $this->returnWithError("/toutici/user/".$id."/edit", "-first_name", "Le prénom est obligatoire.");
        }
        if (empty($email)) {
            $this->returnWithError("/toutici/user/".$id."/edit", "-email", "L'email est obligatoire.");
        }
        if (empty($phone)) {
            $this->returnWithError("/toutici/user/".$id."/edit", "-phone", "Le numéro de téléphone est obligatoire.");
        }
        if (empty($password)) {
            $this->returnWithError("/toutici/user/".$id."/edit", "-password", "Le mot de passe est obligatoire.");
        }

        // L'email est bien un email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->returnWithError("/toutici/user/".$id."/edit", "-email", "L'adresse email n'est pas valide.");
        }

        // Le numéro de téléphone est bien un numéro de téléphone
        if (!preg_match('/^\+?[0-9]{10,15}$/', $phone)) {
            $this->returnWithError("/toutici/user/".$id."/edit", "-phone", "Le numéro de téléphone n'est pas valide.");
        }

        $pattern = '/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[!@#$%^&(),.?":{}|<>])[A-Za-z\d!@#$%^&(),.?":{}|<>]{12,}$/';
        // Le mot de passe est valide
        if (preg_match($pattern, $password)) {
            $this->returnWithError("/toutici/user/".$id."/edit", "-password", "Le mot de passe doit contenir au moins 12 caractères, dont une lettre majuscule, une lette minuscule, un chiffre et un caractère spécial." . $password);
        }

        try {                       
            $user->updateUser($id, $first_name, $last_name, $email, $phone, $password, $location);
            $user = $user->getUserById($id);
            $_SESSION["message"] = "Utilisateur modifié avec succès.";
            unset($_POST["password"]);
            unset($_SESSION['form_data']['password']);
            $_SESSION['user']["id"] = $id;
            $_SESSION['user']["first_name"] = $first_name;
            $_SESSION['user']["last_name"] = $last_name;
            $_SESSION['user']["location"] = $location;
          
            header("Location: /toutici/");
            exit();
        } catch (Error $e) {
            $this->returnWithError("/toutici/user/".$id."/edit", "", "Unknown Error : " . $e->getMessage());
        }
    }

    public function editFormView($id)
    {
        // Logique pour modifier l'utilisateur avec l'ID donné
        $user = $this->getUserById($id);

        if ($user) {
            // Inclure la vue pour afficher le formulaire de modification de l'utilisateur
            require_once __DIR__ . '/../views/edit_user.php';
        } else {
            // Rediriger vers la page 404 si l'utilisateur n'existe pas
            http_response_code(404);
            require_once __DIR__ . '/../views/404.php';
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
