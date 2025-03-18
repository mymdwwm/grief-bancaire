<?

require_once __DIR__ . "models/Client.php";

class ClientController {
    private $clientModel;
    public function __construct() {
        $this->clientModel = new Client();
    }
    public function listClients() {
        $clients = $this->clientModel->getAllClients();
        require_once __DIR__ . "views/liste_client.php";
        // include "views/list_clients.php";
    }



    // necessaire ???
    public function addClientForm() {
        include "views/add_client.php";
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