<?php

class AnnouncementController
{
    public function createForm()
    {
        require_once __DIR__ . '/../views/created_announcement.php';
    }

    public function create()
    {
        // Logique pour créer une nouvelle annonce
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        // Exemple de logique pour enregistrer l'annonce
        // Vous pouvez remplacer ceci par une requête à votre base de données
        if ($title && $content) {
            // Simuler l'enregistrement et obtenir un ID d'annonce
            $id = 0; // Remplacez ceci par l'ID réel de l'annonce créée

            // Rediriger vers l'annonce créée
            header("Location: /announcement/$id");
            exit;
        } else {
            // Afficher un message d'erreur si les champs sont vides
            echo "Erreur lors de la création de l'annonce. Veuillez remplir tous les champs.";
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

    private function getAnnouncementById($id)
    {
        // Exemple de logique pour récupérer une annonce par ID
        // Vous pouvez remplacer ceci par une requête à votre base de données
        $announcements = [
            1 => ['title' => 'Annonce 1', 'content' => 'Contenu de l\'annonce 1'],
            2 => ['title' => 'Annonce 2', 'content' => 'Contenu de l\'annonce 2'],
        ];

        return $announcements[$id] ?? null;
    }
}
?>