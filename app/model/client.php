<?php

require_once __DIR__ . '/../dao/connexion.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Client
{

    private $pdo;

    public function __construct()
    {
        require_once __DIR__ . '/../dao/connexion.php';
        $this->pdo = getConnexion();
        // = $pdo
    }

    public function getAllClients()
    {
        $stmt = $this->pdo->query("SELECT * FROM client");  
        $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $clients;
    }

    public function deleteClient($id_client)
    {   // Suprrime le client
        // Supprimer les comptes associés au client
        $stmt = $this->pdo->prepare("DELETE FROM compte WHERE id_client = ?");
        $stmt->execute([$id_client]);

        // Supprimer le client
        $stmt = $this->pdo->prepare("DELETE FROM client WHERE id_client = ?");
        return $stmt->execute([$id_client]);
    }

    public function getClient($id_client)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM client WHERE id_client = :id_client");
        $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function addClient(string $nom, string $prenom, string $email_client, string $telephone, string $adresse)
    {

        // couleur de l'insert ????
        $stmt = $this->pdo->prepare("INSERT INTO client (nom, prenom, email_client, telephone, adresse) VALUES (:nom, :prenom, :email_client, :telephone, :adresse);");

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email_client', $email_client);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':adresse', $adresse);

        return $stmt->execute();
    }


    public function update($id_client, string $nom, string $prenom, string $email_client, string $telephone, string $adresse)
    {


        $stmt = $this->pdo->prepare("UPDATE client 
                    SET nom = :nom, prenom = :prenom, email_client = :email_client, telephone = :telephone, adresse = :adresse 
                    WHERE id_client = :id_client");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email_client', $email_client);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':id_client', $id_client);

        // $stmt->bindParam(':id_client', $id);

        return $stmt->execute();
    }

    public function clientExists(string $id_client): bool
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM client WHERE id_client = ?");
        $stmt->execute([$id_client]);
        return $stmt->fetchColumn() > 0;
    }

    // Méthode pour récupérer le nombre total de clients
    public function getTotalClients() {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM client");
        return $stmt->fetchColumn(); 
    }

}