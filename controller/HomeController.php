<?php

class HomeController
{
    public function index()
    {
        // Afficher la vue
        require_once __DIR__ . '/../views/home.php';
    }
}