<?php

class HomeController
{
    public function index()
    {
        $announcements = new Announcement();
        $announcements = $announcements->getAllAnnouncements();

        // Afficher la vue
        require_once __DIR__ . '/../views/home.php';
    }
}
