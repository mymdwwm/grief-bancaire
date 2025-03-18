<?php

class adminController 
{
    public function index() 
    {
        require_once __DIR__ . '/../views/login.php';
    }

    public function connect($username, $password)
    {
        $adminCredentials = [
            'username' => 'administrateur',
            'password' => hash('sha256', '1234')
        ];

        if ($username == $adminCredentials['username'] && hash('sha256', $password) == hash('sha256', '1234')) {
            $_SESSION['username'] = $username;
            $_SESSION['message_flash'] = 'La connexion est un succès';
            header('Location: index.php');
        } else {
            $_SESSION['error_message'] = 'Les informations de connexion sont erronnées.';

            require_once __DIR__ . '/../views/login.php';
        }
    }

    public function disconnect()
    {
        unset($_SESSION['username']);
        header('Location: index.php');
    }
}