<?php

class adminController 
{
    public function index() 
    {
        require_once __DIR__ . '/../views/login.php';
    }

    public function connect($username, $password)
    {
        session_start();

        // HASHAGE DU MOT DE PASSE à stocker 
        // Un vrai projet récupère le mot de passe par la saisie de l'utilisateur 
        $hashedPassword = hash('1234', PASSWORD_BCRYPT);

        // stockage temporaire
        $adminCredentials = [
            'username' => 'administrateur',
            'password' => $hashedPassword // utilisation du mdp hashé
        ];

// Vérification des identifiants d'administrateur
        if ($username == $adminCredentials['username'] && password_verify($password, $adminCredentials['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['message_flash'] = 'La connexion est un succès';
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['error_message'] = 'Les informations de connexion sont erronnées.';

            require_once __DIR__ . '/../views/login.php';
        }
    }

    public function disconnect()
    {
        session_start();
        session_destroy();
        unset($_SESSION['username']);
        header('Location: index.php');
    }
}




/*
class adminController{
    public function connexionAdmin(){
        if(isser($_POST['connect']) && isset($_POST['password'])){
        // récupère la saisie de l'utilisateur
        echo 'bjr';
        $email = $_POST['email'];
        $password = $_POST['password'];
        // instanciation de l'admin 
        $admin=new admin($email,$password);

        $adminObjet = new admin_DAO();
        // etablir la connexion en vérifiant si les données saisie sont correcte
        $admin_=$adminObjet->connexion($admin);

        // on verifie si les données sont bien recupere depuis le bd et puis on creer ..
        if($admin_){
        $_SESSION['id']= $admin_->getid();
        $_SESSION['email']= $admin_->getemail();
        header('location:index.php?action=listeClient');
        }
    }

    $template="index";
    require_once __DIR__ . '/../views/layout_index.phtml';
    }


    public function createAdmin(){
        if(isset($_POST['add']) && isset($_POST['password']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordHach=password_hash($password, PASSWORD_BCRYPT);
            $admin=new admin($email,$passwordHach)
            $admin_ =new admin_DAO();
            $admin_->create_admin($admin);

        }
        $template="ajouteAdmin";
        require_once __DIR__ . '/../views/layout_index.phtml';
    }
}

    */