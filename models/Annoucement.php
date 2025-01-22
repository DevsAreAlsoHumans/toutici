<?php

require_once __DIR__ . '/../config/database.php';

class Announcement
{
    private $db;

    public function __construct()
    {
        // Initialiser la connexion à la base de données
        $this->db = Database::getInstance();
    }

    /**
     * Récupère toutes les annonces.
     */
    public function getAllAnnouncements() {}

    /**
     * Récupère une annonce par son ID.
     */
    public function getAnnouncementById($id) {}

    /**
     * Ajoute une nouvelle annonce.
     */
    public function addAnnouncement($title, $description, $image, $userId) {}

    /**
     * Met à jour une annonce existante.
     */
    public function updateAnnouncement($id, $title, $description, $image) {}

    /**
     * Supprime une annonce par son ID.
     */
    public function deleteAnnouncement($id) {}

    /**
     * Récupère les annonces d'un utilisateur spécifique.
     */
    public function getAnnouncementsByUserId($userId) {}
}
