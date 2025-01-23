<?php

class UserController
{
    public function show($id)
    {
        // Logique pour récupérer l'utilisateur avec l'ID donné
        $user = $this->getUserById($id);

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
        // Logique pour récupérer l'utilisateur avec l'ID donné depuis la base de données
    }
}
?>