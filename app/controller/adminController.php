<?php
class AdminController 
{
    public function index() 
    {
        
        require_once __DIR__ . '/../views/login.php';
    }

    public function connect($username, $password)
    {
        session_start();
        
        $adminCredentials = [
            'username' => 'administrateur',
            'password' => '1234' // Mot de passe temporaire
        ];
    
        // Vérifier les identifiants
        if ($username === $adminCredentials['username'] && $password === $adminCredentials['password']) {
            $_SESSION['username'] = $username;  
            $_SESSION['message_flash'] = 'La connexion est un succès';
    
            header('Location: index.php'); // Envoi vers l'accueil
            exit;
        } else {
            $_SESSION['error_message'] = 'Identifiants incorrects.';
            header('Location: index.php?action=login');
            exit;
        }
    }

    public function disconnect()
    {
        session_start();
        $_SESSION = []; // Vide toutes les variables de session
        session_destroy(); // Détruit la session côté serveur
        setcookie(session_name(), '', time() - 3600, '/'); // Supprime le cookie de session
    
        header('Location: index.php?action=login'); // Redirection vers login après déconnexion
        exit;
    }
    
}



        /*
        if ($username == $adminCredentials['username'] && hash('sha256', $password) == hash('sha256', '1234')) {
            $_SESSION['username'] = $username;
            $_SESSION['message_flash'] = 'La connexion est un succès';
            header('Location: index.php');
        } else {
            $_SESSION['error_message'] = 'Les informations de connexion sont erronées.';
        header('Location: index.php?action=login');
        exit;
        }
        */







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