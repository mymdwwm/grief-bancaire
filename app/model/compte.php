<?php

class Compte {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function getAllComptes() {
        $stmt = $this->db->query("SELECT * FROM compte");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addCompte($rib, $type_compte, $solde_compte, $id_client) {
        $stmt = $this->db->prepare("INSERT INTO compte (rib, type_compte, solde_compte, id_client) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$rib, $type_compte, $solde_compte, $id_client]);
    }
}