<?php

class ClientController
{
    private $clientModel;

    public function __construct()
    {
        require_once __DIR__ . "/../model/client.php";
        $this->clientModel = new Client(); // verifier la class
    }

    public function getAllClients() {
        $clients = $this->clientModel->getAllClients();

    return $clients;
    }
    public function listClient()
    {
        $clients = $this->clientModel->getAllClients();
        $totalClients = $this->clientModel->getTotalClients();
        require_once __DIR__ . "/../views/liste-client.php";
    }

    public function viewClient($id_client) {
    if ($this->clientModel->clientExists($id_client)) {
        $client = $this->clientModel->getClient($id_client);
        require_once __DIR__ . '/../views/view-client.php';
    } else {
        echo "Client introuvable.";
    }
}




    public function modifyClient($id_client) // a verifier le nom
    {
        $client = $this->clientModel->getClient($id_client);
        require_once __DIR__ . '/../views/modif-client.php';
    }

    public function deleteClient($id_client)
    {
          // Supprimer le client et ses comptes associés
    if ($this->clientModel->deleteClient($id_client)) {
        // Stocker un message de confirmation en session
        session_start();
        $_SESSION['message'] = "Le client et ses comptes associés ont été supprimés avec succès.";

        // Rediriger vers la liste des clients
        header("Location: index.php?action=liste-client&success=1");
        exit();
    } else {
        echo "Erreur lors de la suppression du client.";
    }
    }

    public function updateClient($id_client,string $nom, string $prenom, string $email_client, string $telephone, string $adresse)
    {
        $this->clientModel->update($id_client,$nom, $prenom, $email_client, $telephone, $adresse);
        header('Location: index.php?action=liste-client&update=1&nom=' . urlencode($nom) . '&prenom=' . urlencode($prenom));
    exit;
    }

    // formulaire d'ajout du clients
    public function newClient()
    {
        require_once __DIR__ . '/../views/nvx-client.php';
    }


    public function addClient(string $nom, string $prenom, string $email_client, string $telephone, string $adresse)
    {
        // require __DIR__ . '/../model/Client.php';

        if (!$this->clientModel->clientExists($email_client)) {
            $this->clientModel->addClient($nom, $prenom, $email_client, $telephone, $adresse);
            // Stocker un message de confirmation en session
            session_start();
            $_SESSION['message'] = "Le client $nom $prenom a bien été ajouté.";

            header("Location: index.php?page=liste-client&success=1&nom=" . urlencode($nom) . "&prenom=" . urlencode($prenom));
exit();

        } else {
            echo "Le client existe déjà.";
        }
    }

    private function clientExists(string $email_client): bool
    {
        return $this->clientModel->clientExists($email_client);
    }
}
?>