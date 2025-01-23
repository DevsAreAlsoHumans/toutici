<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthMiddleware
{
    public function getUserFromToken()
    {
        // Vérifier si le cookie contenant le JWT est présent
        if (!isset($_COOKIE['auth_token'])) {
            return null; // Aucun utilisateur connecté
        }

        $jwt = $_COOKIE['auth_token'];

        try {
            // Décoder le JWT
            // TODO: Utiliser une clé secrète plus sécurisée
            $decoded = JWT::decode($jwt, new Key('test', 'HS256'));

            // Retourner les informations utilisateur du payload
            return [
                'id' => $decoded->user_id,
                'email' => $decoded->user_email,
                'last_name' => $decoded->user_last_name,
                'first_name' => $decoded->user_first_name,
                'location' => $decoded->user_location,
            ];
        } catch (Exception $e) {
            // Si le token est invalide ou expiré
            return null;
        }
    }
}
