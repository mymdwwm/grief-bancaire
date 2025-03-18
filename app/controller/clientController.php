<?

require_once __DIR__ . "models/Client.php";

class clientController 
{
    private $clientModel;

    public function __construct() {
        $this->clientModel = new Client();
    }

    public function newClient() 
    {
        require_once __DIR__ . '/../views/nvx-client.php';
    }


    public function listClient() {
        $clients = $this->clientModel->getAllClients();
        require_once __DIR__ . "views/liste_client.php";
        // include "views/list_clients.php";
    }

    public function viewClient($id) 
    {
        $task = $this->clientModel->getClient($id);
        require_once __DIR__ . '/../views/view-client.php';
    }

    public function modifyClient($id) 
    {
        $task = $this->clientModel->getClient($id);
        require_once __DIR__ . '/../views/modif-client.php';
    }

    public function deleteClient($id) 
    {
        $this->clientModel->deleteClient($id);
        header('Location: index.php');
    }


    public function updateClient(string $id, string $titre, string $description, string $status) 
    {
        $this->clientModel->updateClient($id, $titre, $description, $status);
        header('Location: index.php');
    }



    // necessaire ???
    public function addClientForm() {
        include "views/nvx-client.php";
    }





    public function addClient(string $nom, string $prenom, string $email_client, string $telephone, string $adresse)
{
    // Vérifiez si le client existe déjà (par exemple, par email)
    if (!$this->clientExists($email_client)) {
        $this->clientModel->addClient($nom, $prenom, $email_client, $telephone, $adresse);
        header('Location: /index.php?action=list_clients');
    } else {
        // Gérer le cas où le client existe déjà
        echo "Le client existe déjà.";
    }
}

private function clientExists(string $email_client): bool
{
    // Implémentez la logique pour vérifier si un client avec cet email existe déjà
    // Par exemple, en utilisant une requête à la base de données
    // Retourne true si le client existe, false sinon
    return $this->clientModel->clientExists($email_client);
}




}