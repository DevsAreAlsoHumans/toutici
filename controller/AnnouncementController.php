<?php

class AnnouncementController
{
    public function createForm()
    {
        require_once __DIR__ . '/../views/created_announcement.php';
    }

    public function create()
    {
       
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

    private function getAnnouncementById($id)
    {
        
    }
}
?>