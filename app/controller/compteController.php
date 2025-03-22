
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../model/compte.php';

class CompteController
{
    private $compteModel;

    public function __construct($pdo){
        $this->compteModel = new Compte($pdo);}

    public function listCompte()
    {
        $comptes = $this->compteModel->getAllComptes();
        $totalComptes = $this->compteModel->getTotalComptes();
        //var_dump($comptes); // 🔍 Vérifier si les données existent ici
    require_once __DIR__ . '/../views/liste-compte.php';
    }

    public function viewCompte($id_compte)
    {
        $compte = $this->compteModel->getCompte($id_compte);
        if (!$compte) {
            die("Erreur : Compte introuvable.");
        }
        require_once __DIR__ . '/../views/view-compte.php';
    }


    public function deleteCompte($id_compte)
    { // Récupère l'ID du client associé au compte
        $id_client = $this->compteModel->getClientByCompte($id_compte);
        // Supprimer le compte
    if ($this->compteModel->deleteCompte($id_compte)) {
        // Stocker un message de confirmation en session
        session_start();
        $_SESSION['message'] = "Le compte a été supprimé avec succès.";

        // Rediriger vers la liste des comptes ou des clients
        header("Location: index.php?action=liste-compte&success=1&id_client=" . urlencode($id_client));
        exit();
    } else {
        echo "Erreur lors de la suppression du compte.";
    }
    }

    // formulaire d'ajout du clients
    public function newCompte()
    {
        require_once __DIR__ . '/../views/nvx-compte.php';
    }


    public function addCompte(string $rib, string $type_compte, $solde_compte, int $id_client)
{
    // Vérifiez si le compte existe déjà
    if (!$this->compteModel->compteExists($rib)) {
        $id_compte=$this->compteModel->newCompte($rib, $type_compte, $solde_compte, $id_client);

        // Stocker un message de confirmation en session
        session_start();
        $_SESSION['message'] = "Le compte a bien été ajouté.";

        header("Location: index.php?action=voir-compte&id= success=1" . $id_compte);
        exit();
    } else {
        echo "Le compte existe déjà.";
    }
}

}
