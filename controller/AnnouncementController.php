<?php

class AnnouncementController
{
    public function createForm()
    {
        require_once __DIR__ . '/../views/created_announcement.php';
    }

    public function create()
    {
        if (!isset($_SESSION["user"])) {
            header("Location: /");
            $_SESSION["message"] = "Connectez-vous ou créez un compte pour écrire un article";
        } else {
            // Logique pour créer une nouvelle annonce
            $title = $_POST["title"];
            $description = $_POST["description"];
            $image = $_POST["image"];
            $userId = $_SESSION["user"]["id"];

            $announcement = new Announcement();
            $announcement->addAnnouncement($title, $description, $image, $userId);

            header("Location: /");
            $_SESSION["message"] = "Votre annonce a été créée avec succès";
        }
    }

    public function show($id)
    {
        // Logique pour récupérer l'annonce avec l'ID donné
        $announcement = $this->getAnnouncementById($id);

        if ($announcement) {
            // Inclure la vue pour afficher l'annonce
            require_once __DIR__ . '/../views/announcement.php';
        } else {
            // Rediriger vers la page 404 si l'annonce n'existe pas
            http_response_code(404);
            require_once __DIR__ . '/../views/404.php';
        }
    }

    private function getAnnouncementById($id) {}
}
