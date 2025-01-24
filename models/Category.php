<?php

require_once __DIR__ . '/../config/database.php';

class Category
{
    private $db;

    public function __construct()
    {
        // Initialiser la connexion à la base de données
        $this->db = Database::getInstance();
    }

    public function getAllCategories()
    {
        $request = "SELECT * FROM category";

        $stmt = $this->db->prepare($request);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Error("Category.getAllCategories failed: " . $e->getMessage());
        }

        return $stmt->fetchAll();
    }

    public function getCategoryById($id)
    {
        $request = "SELECT * FROM category WHERE id = ?";

        $stmt = $this->db->prepare($request);

        $stmt->bindParam(1, $id);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Error("Category.getCategoryById failed: " . $e->getMessage());
        }

        return $stmt->fetch();
    }
}