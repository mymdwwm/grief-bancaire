<?php
require_once __DIR__ . '/../dao/connexion.php';


class Compte {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getCompte($id_compte) {
        $stmt = $this->pdo->prepare("SELECT * FROM compte WHERE id_compte = ?");
        $stmt->execute([$id_compte]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllComptes() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM compte"); // ✅ Assure-toi que la table s'appelle bien `compte`
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
    }
    public function newCompte($rib, $type_compte, $solde_compte, $id_client) {
        $stmt = $this->pdo->prepare("INSERT INTO compte (rib, type_compte, solde_compte, id_client) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$rib, $type_compte, $solde_compte, $id_client]);
    }

    public function deleteCompte($id_compte) {
        $stmt = $this->pdo->prepare("DELETE FROM compte WHERE id_compte = ?");
        return $stmt->execute([$id_compte]);
    }

    public function compteExists(string $rib): bool {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM compte WHERE rib = ?");
        $stmt->execute([$rib]);
        return $stmt->fetchColumn() > 0;
    }

    
}
