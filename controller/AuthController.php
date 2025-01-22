<?php

class AuthController
{
    public function registerForm()
    {
        require_once __DIR__ . '/../views/register.php';
    }

    public function register()
    {
       
    }

    public function loginForm()
    {
        require_once __DIR__ . '/../views/login.php';
    }

    public function login()
    {
        
    }
}
?>