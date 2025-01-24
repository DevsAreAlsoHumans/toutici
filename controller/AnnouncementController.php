<?php

require_once __DIR__ . '/../models/Announcement.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/User.php';

class AnnouncementController
{
    public function createForm()
    {
        $category = new Category();
        $categories = $category->getAllCategories();
        require_once __DIR__ . '/../views/created_announcement.php';
    }

    public function create()
    {
        if (!isset($_SESSION["user"])) {
            $_SESSION["message"] = "Connectez-vous ou créez un compte pour écrire une annonce";
            header("Location: /");
            exit();
        } else {
            // Logique pour créer une nouvelle annonce
            $title = $_POST["title"];
            $description = $_POST["description"];
            $image = $_FILES["image"];
            $userId = $_SESSION["user"]["id"];
            $categoryId = $_POST["category"];
            $price = $_POST["price"];

            if (empty($title)) {
                $this->returnWithError("/toutici/announcement/create", "-title", "Le titre est obligatoire.");
            }
            if (empty($description)) {
                $this->returnWithError("/toutici/announcement/create", "-description", "La description est obligatoire.");
            }
            if (empty($categoryId)) {
                $this->returnWithError("/toutici/announcement/create", "-category", "La catégorie est obligatoire.");
            }
            if (empty($price)) {
                $this->returnWithError("/toutici/announcement/create", "-price", "Le prix est obligatoire.");
            }

            $imageName = null;

            if ($image && $image["tmp_name"]) {
                $allowedMimeTypes = [
                    'image/jpeg',
                    'image/jpg',
                    'image/png',
                    'image/webp',
                ];
                $fileMimeType = mime_content_type($image["tmp_name"]);

                if (!in_array($fileMimeType, $allowedMimeTypes)) {
                    $this->returnWithError("/toutici/announcement/create", "-image", "Le fichier doit être une image (jpeg, jpg, png, webp).");
                }

                $imageName = uniqid() . "-" . $image["name"];
                $imageDir = __DIR__ . "/../public/img/";
                $imagePath = $imageDir . $imageName;

                // Ensure the directory exists
                if (!is_dir($imageDir)) {
                    mkdir($imageDir, 0777, true);
                }

                if (!move_uploaded_file($image["tmp_name"], $imagePath)) {
                    $this->returnWithError("/toutici/announcement/create", "-image", "Erreur lors du téléchargement de l'image.");
                }
                
            }

            try {
                $announcement = new Announcement();
                $announcement->addAnnouncement($title, $description, $imageName, $price, $userId, $categoryId);
                unset($_SESSION['form_data']);

                $_SESSION["message"] = "Votre annonce a été créée avec succès";
                header("Location: /toutici/");
                exit();
            } catch (\Throwable $th) {
                $this->returnWithError("/toutici/announcement/create", "", "Erreur inconnue : " . $th->getMessage());
            }
        }
    }

    public function show($id)
    {
        // Logique pour récupérer l'annonce avec l'ID donné
        $announcement = new Announcement();
        $announcement = $announcement->getAnnouncementById($id);

        if (!$announcement) {
            $_SESSION["message"] = "L'annonce n'existe pas.";
            header("Location: /toutici/");
            exit();
        }

        $category = new Category();
        $category = $category->getCategoryById($announcement['category_id']);

        $user = new User();
        $userAnnouncement = $user->getUserById($announcement['user_id']);

        require_once __DIR__ . '/../views/announcement.php';
    }

    private function getAnnouncementById($id) {}

    private function returnWithError($location, $errorName, $errorMessage)
    {
        $_SESSION["error" . $errorName] = $errorMessage;
        $_SESSION['form_data'] = $_POST;
        header("Location:" . $location);
        exit();
    }
}
