<?php

require_once __DIR__ . '/../dao/connexion.php';

class Client{

    private $pdo;

    public function __construct()
    {
        $this->pdo = getConnexion();
        // = $pdo
    }

    public function getAllClients()
    {
        $sql = "SELECT * FROM client";
        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll();
    }

    public function deleteClient($id)
    {
        $sqlDelete = "DELETE FROM client WHERE id=:id";
        $stmt = $this->pdo->prepare($sqlDelete);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getClient($id) 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM client WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function addClient(string $nom, string $prenom, string $email_client, string $telephone, string $adresse)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (nom, prenom, email_client, telephone, adresse) VALUES (:nom, :prenom, :email_client, :telephone, :adresse);");

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email_client', $email_client);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':adresse', $adresse);
        
        return $stmt->execute();
    }


    public function update(string $id, string $nom, string $prenom, string $email_client, string $telephone, string $adresse) 
    {
        $stmt = $this->pdo->prepare("UPDATE client 
                    SET nom = :nom, prenom = :prenom, email_client = :email_client, telephone = :telephone, adresse = :adresse 
                    WHERE id=:id;");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email_client', $email_client);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    public function clientExists(string $email_client): bool {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM client WHERE email = ?");
        $stmt->execute([$email_client]);
        return $stmt->fetchColumn() > 0;
    }

}