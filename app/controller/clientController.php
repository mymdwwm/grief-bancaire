<?php

class ClientController
{
    private $clientModel;

    public function __construct()
    {
        require_once __DIR__ . "/../model/client.php";
        $this->clientModel = new Client(); // verifier la class
    }

    public function newClient()
    {
        require_once __DIR__ . '/../views/nvx-client.php';
    }

    public function listClient()
    {
        $clients = $this->clientModel->getAllClients();
        require_once __DIR__ . "/../views/liste-client.php";
    }

    public function viewClient($id_client)
    {
        $client = $this->clientModel->getClient($id_client);
        if (!$client) {
            die("Erreur : Client introuvable.");
        }
        require_once __DIR__ . '/../views/view-client.php';
    }

    public function modifyClient($id_client) // a verifier le nom
    {
        $client = $this->clientModel->getClient($id_client);
        require_once __DIR__ . '/../views/modif-client.php';
    }

    public function deleteClient($id_client)
    {
        $this->clientModel->deleteClient($id_client);
        header('Location: index.php?action=liste-client'); // Redirige vers la liste des clients
        exit;
    }

    public function updateClient(string $nom, string $prenom, string $email_client, string $telephone, string $adresse)
    {
        $this->clientModel->update( $nom, $prenom, $email_client, $telephone, $adresse);
        header('Location: index.php?action=liste-client');
        exit;
    }

    public function addClientForm()
    {
        include __DIR__ . "/../views/nvx-client.php";
    }

    public function addClient(string $nom, string $prenom, string $email_client, string $telephone, string $adresse)
    {
        if (!$this->clientModel->clientExists($email_client)) {
            $this->clientModel->addClient($nom, $prenom, $email_client, $telephone, $adresse);
            header('Location: /index.php?action=liste-client');
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