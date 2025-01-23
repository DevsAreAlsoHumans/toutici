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
    public function addAnnouncement($title, $description, $image, $userId)
    {
        $query = 'INSERT INTO announcement (title, description, image, user_id) VALUES (:title, :description, :image, :userId)';

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Error("Announcement.addAnnouncement failed: " . $e->getMessage());
        }
    }

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
