<?php

function getConnexion() {
    // --- Configuration de la base de données ---
    $host     = 'localhost';
    $dbname   = 'gestion_bancaire';
    $username = 'root';
    $password = '';
    $charset  = 'utf8mb4';

    // Construction du DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    // Options pour PDO : 
    // - Lancer des exceptions en cas d'erreur
    // - Récupérer les résultats sous forme de tableaux associatifs
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        // Création de la connexion PDO
        $pdo = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, on affiche un message et on arrête le script
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    return $pdo;
}
