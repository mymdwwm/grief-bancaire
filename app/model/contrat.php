
<?php

class Contrat {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

/* ou 
   public function __construct()
    {
        $this->pdo = getConnexion();
    }
*/

    public function getAllContrats() {
        $sql="SELECT * FROM contrat";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    public function addContrat($type_contrat, $montant, $duree, $id_client) {
        $stmt = $this->pdo->prepare("INSERT INTO contrat (type_contrat, montant, duree, id_client) VALUES (:type_contrat, :montant, :duree, :id_client)");

        $stmt->bindParam(":type_contrat", $type_contrat);
        $stmt->bindParam(":montant", $montant);
        $stmt->bindParam(":duree", $duree);
        $stmt->bindParam(":id_client", $id_client);

        $stmt->execute();
    }
}
