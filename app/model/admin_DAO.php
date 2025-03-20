<?php

/*
require_once __DIR__ . "/../model/bdconnexion.php";

class admin_DAO
{
    public function connexionn(admin $admin)
    {
        $query = DATABASE::connect()->prepare("SELECT * FROM admin WHERE email = ?");
        $query->execute([$admin->getemail()]);
        $objAdmin = $query->fetch(PDO::FETCH_ASSOC);

        if ($objAdmin) {
            if (password_verify($admin->getpassword(), $objAdmin["password"])) {
                return new admin($objAdmin['email'], $objAdmin['password']);
            }
        }
        return null;
    }
    public function create_admin(admin $admin)
    {
        $query = DATABASE::connect()->prepare("INSERT INTO admin (email, password) VALUES (?, ?)");
        $query->execute([$admin->getemail(), $admin->getpassword()]);
    }
}

*/