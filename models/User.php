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
    public function getUserById($id) {}

    /**
     * Ajoute un nouvel utilisateur.
     */
    public function addUser($first_name, $last_name, $email, $phone, $password, $location) {}

    /**
     * Supprime un utilisateur par son ID.
     */
    public function deleteUser($id) {}

    /**
     * Met à jour les informations d'un utilisateur.
     */
    public function updateUser($id, $first_name, $last_name, $email, $phone, $password, $location) {}
}
