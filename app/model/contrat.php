
<?php

class Contrat {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

// Réxupèrer tous les contrats
    public function getAllContrats() {
        $sql="SELECT * FROM contrat";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

// Récuperer un contrat par son id
    public function getContratById($id_contrat) {
        $stmt = $this->pdo->prepare("SELECT * FROM contrat WHERE id_contrat = ?");
        $stmt->execute([$id_contrat]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

 // Vérifier si un client existe avant d'ajouter un contrat
 public function clientExists($id_client):bool {
    $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM client WHERE id_client = ?");
    $stmt->execute([$id_client]);
    return $stmt->fetchColumn() > 0;
}


  // Fonction pour ajouter un contrat
  public function ajouterContrat($type_contrat, $montant, $duree, $id_client) {
    try {
        $stmt = $this->pdo->prepare("INSERT INTO contrat (type_contrat, montant, duree, id_client) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$type_contrat, $montant, $duree, $id_client]);
    } catch (PDOException $e) {
        die("Erreur lors de l'ajout du contrat : " . $e->getMessage());
    }
}


// Ajoute un contrat
    public function addContrat($type_contrat, $montant, $duree, $id_client) {
        $stmt = $this->pdo->prepare("INSERT INTO contrat (type_contrat, montant, duree, id_client) VALUES (:type_contrat, :montant, :duree, :id_client)");

        $stmt->bindParam(":type_contrat", $type_contrat);
        $stmt->bindParam(":montant", $montant);
        $stmt->bindParam(":duree", $duree);
        $stmt->bindParam(":id_client", $id_client);

        $stmt->execute();
    }

    public function getContratWithClient($id_contrat) {
        $stmt = $this->pdo->prepare("
            SELECT c.*, cl.*
            FROM contrat c
            JOIN client cl ON c.id_client = cl.id_client
            WHERE c.id_contrat = ?
        ");
        $stmt->execute([$id_contrat]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

}
