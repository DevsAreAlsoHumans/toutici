<?php

class Error404Controller
{
    public function index()
    {
        // Afficher la vue
        require_once __DIR__ . '/../views/404.php';
    }
}
