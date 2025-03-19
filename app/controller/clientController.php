<?php

class ClientController
{
    private $clientModel;

    public function __construct() {
        require_once __DIR__ . "/../model/client.php";
        $this->clientModel = new Client();
    }

    public function newClient()
    {
        require_once __DIR__ . '/../views/nvx-client.php';
    }

    public function listClient() {
        $clients = $this->clientModel->getAllClients();
        require_once __DIR__ . "/../views/liste-client.php";
    }

    public function viewClient($id)
    {
        $client = $this->clientModel->getClient($id);
        require_once __DIR__ . '/../views/view-client.php';
    }

    public function modifyClient($id)
    {
        $client = $this->clientModel->getClient($id);
        require_once __DIR__ . '/../views/modif-client.php';
    }

    public function deleteClient($id)
    {
        $this->clientModel->deleteClient($id);
        header('Location: index.php');
        exit;
    }

    public function updateClient($id, string $nom, string $prenom, string $email_client, string $telephone, string $adresse)
    {
        $this->clientModel->update($id, $nom, $prenom, $email_client, $telephone, $adresse);
        header('Location: index.php?action=liste-client');
        exit;
    }

    public function addClientForm() {
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
