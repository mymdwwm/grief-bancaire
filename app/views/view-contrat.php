<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5">
    <h2>Détails du Contrat</h2>

    <!-- Informations du Client -->
    <h3>Informations du Client</h3>
    <p><strong>Nom :</strong> <?= htmlspecialchars($contratWithClient['nom']) ?></p>
    <p><strong>Prénom :</strong> <?= htmlspecialchars($contratWithClient['prenom']) ?></p>
    <p><strong>Email :</strong> <?= htmlspecialchars($contratWithClient['email_client']) ?></p>
    <p><strong>Téléphone :</strong> <?= htmlspecialchars($contratWithClient['telephone']) ?></p>
    <p><strong>Adresse :</strong> <?= htmlspecialchars($contratWithClient['adresse']) ?></p>

    <!-- Informations du Contrat -->
    <h3>Informations du Contrat</h3>
    <p><strong>Type de Contrat :</strong> <?= htmlspecialchars($contratWithClient['type_contrat']) ?></p>
    <p><strong>Montant :</strong> <?= htmlspecialchars($contratWithClient['montant']) ?> €</p>
    <p><strong>Durée :</strong> <?= htmlspecialchars($contratWithClient['duree']) ?> mois</p>
   

    <a href="index.php?action=liste-contrats" class="btn btn-secondary">Retour à la liste des contrats</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
