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
    public function getAnnouncementById($id) {
        $query = 'SELECT * FROM announcement WHERE id = :id';
    
        $stmt = $this->db->prepare($query);
    
        $stmt->bindParam(':id', $id);
    
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Error("Announcement.getAnnouncementById failed: " . $e->getMessage());
        }
    
        return $stmt->fetch();
    }

    /**
     * Ajoute une nouvelle annonce.
     */
       public function addAnnouncement($title, $description, $image, $price, $userId, $categoryId)
    {
        $query = 'INSERT INTO announcement (title, description, image, price, user_id, category_id) VALUES (:title, :description, :image, :price, :userId, :categoryId)';
    
        $stmt = $this->db->prepare($query);
    
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':categoryId', $categoryId); // Corrected parameter name
    
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
    public function getAnnouncementsByUserId($userId) {
        $query = 'SELECT * FROM announcement WHERE user_id = :userId';
    
        $stmt = $this->db->prepare($query);
    
        $stmt->bindParam(':userId', $userId);
    
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Error("Announcement.getAnnouncementsByUserId failed: " . $e->getMessage());
        }
    
        return $stmt->fetchAll();
    }
}
