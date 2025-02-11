<?php

require_once __DIR__ . '/../models/Announcement.php';

class SearchController
{
    public function index()
    {
        // redirection sur home si pas de search
        if (!isset($_GET["search"])) {
            header("Location: /toutici/");
        }

        $search = $_GET["search"];

        $announcementController = new Announcement();
        $announcements = $announcementController->getAllAnnouncements();

        // filtre sur toutes les annonces pour récupérer ceux correspondant à la recherche dans le titre ou la description
        $filteredAnnouncements = array_filter($announcements, function ($announcement) use ($search) {
            return stripos($announcement['title'], $search) !== false ||
                stripos($announcement['description'], $search) !== false;
        });

        require_once __DIR__ . '/../views/search.php';
    }
}