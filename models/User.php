<?php

require_once __DIR__ . '/../config/database.php';

class User
{
    private $db;

    public function __construct()
    {
        // Initialiser la connexion à la base de données
        $this->db = Database::getInstance();
    }

    /**
     * Récupère tous les utilisateurs.
     */
    public function getAllUsers() {}

    /**
     * Récupère un utilisateur par son ID.
     */
    public function getUserById($id)
    {
        $request = "SELECT * FROM user WHERE id = ?";

        $stmt = $this->db->prepare($request);

        $stmt->bindParam(1, $id);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Error("User.getUserById failed: " . $e->getMessage());
        }

        return $stmt->fetch();
    }

    /**
     * Récupère un utilisateur par son Email.
     */
    public function getUserByEmail($email)
    {
        $request = "SELECT * FROM user WHERE email = ?";

        $stmt = $this->db->prepare($request);

        $stmt->bindParam(1, $email);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Error("User.getUserByEmail failed: " . $e->getMessage());
        }

        return $stmt->fetch();
    }

    /**
     * Ajoute un nouvel utilisateur.
     */
    public function addUser($first_name, $last_name, $email, $phone, $password, $location)
    {
        $request = "INSERT INTO user (first_name, last_name, email, phone, password, location) VALUES ( ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($request);

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(1, $first_name);
        $stmt->bindParam(2, $last_name);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $phone);
        $stmt->bindParam(5, $password_hash);
        $stmt->bindParam(6, $location);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Error("User.addUser failed: " . $e->getMessage());
        }

        return null;
    }

    /**
     * Supprime un utilisateur par son ID.
     */
    public function deleteUser($id) {}

    /**
     * Met à jour les informations d'un utilisateur.
     */
    public function updateUser($id, $first_name, $last_name, $email, $phone, $password, $location) {}
}
