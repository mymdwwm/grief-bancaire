<?php
require_once __DIR__ . '/../model/contrat.php';
require_once __DIR__ . '/../dao/connexion.php'; // Connexion à la BDD

class ContratController {
    private $contratModel;

    public function __construct() {
        $pdo = getConnexion();
        $this->contratModel = new Contrat($pdo);
    }

    // Afficher tous les contrats et son nombre
    public function listContrats() {
        $contrats = $this->contratModel->getAllContrats();
        $totalContrats = count($contrats);
        require_once __DIR__ . '/../views/liste-contrat.php';
    }

    // Ajouter un contrat ( a revoir )
    public function newContrat() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $type_contrat = $_POST['type_contrat'];
            $montant = $_POST['montant'];
            $duree = $_POST['duree'];
            $id_client = $_POST['id_client'];

            // Vérifiez si le client existe
        if ($this->contratModel->clientExists($id_client)) {
            $this->contratModel->addContrat($type_contrat, $montant, $duree, $id_client);
            header("Location: index.php?action=liste-contrats&success=1");
            exit();
        } else {
            echo "Erreur : Le client avec l'ID $id_client n'existe pas.";
        }
        }
        require_once __DIR__ . '/../views/nvx-contrat.php';
    }

    public function ajouterContrat() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Vérifie si toutes les données sont présentes
            if (!empty($_POST['type_contrat']) && !empty($_POST['montant']) && !empty($_POST['duree']) && !empty($_POST['id_client'])) {
                
                // Récupération des données du formulaire
                $type_contrat = htmlspecialchars($_POST['type_contrat']);
                $montant = (float) $_POST['montant'];
                $duree = (int) $_POST['duree'];
                $id_client = (int) $_POST['id_client'];

                // Vérifier si le client existe avant d'insérer le contrat
                if ($this->contratModel->clientExists($id_client)) {
                    // Insérer le contrat
                    $ajoutReussi = $this->contratModel->ajouterContrat($type_contrat, $montant, $duree, $id_client);

                    if ($ajoutReussi) {
                        // Redirection après succès
                        header("Location: index.php?action=view-contrat");
                        exit();
                    } else {
                        echo "<p style='color:red;'>Erreur lors de l'ajout du contrat.</p>";
                    }
                } else {
                    echo "<p style='color:red;'>Le client avec l'ID $id_client n'existe pas.</p>";
                }
            } else {
                echo "<p style='color:red;'>Veuillez remplir tous les champs.</p>";
            }
        }

        require_once __DIR__ . '/../views/ajouter-contrat.php';
    }



    public function viewContrat($id_contrat) {
        $contratWithClient = $this->contratModel->getContratWithClient($id_contrat);

        // verif 
        if (!$contratWithClient) {
            echo "<p style='color: red; text-align: center;'>Contrat non trouvé.</p>";
            return;
        }
    
        require_once __DIR__ . '/../views/view-contrat.php';
    }
    


    
}
