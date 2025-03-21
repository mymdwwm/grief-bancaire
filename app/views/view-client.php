<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5">
    <h2>Détails du client</h2>
    <p><strong>N° client :</strong> <?= htmlspecialchars($client['id_client']) ?></p>
    <p><strong>Nom :</strong> <?= htmlspecialchars($client['nom']) ?></p>
    <p><strong>Prenom :</strong> <?= nl2br(htmlspecialchars($client['prenom'])) ?></p>
    <p><strong>Email :</strong> <?= htmlspecialchars($client['email_client']) ?></p>
    <p><strong>Téléphone :</strong> <?= htmlspecialchars($client['telephone']) ?></p>
    <p><strong>Adresse :</strong> <?= htmlspecialchars($client['adresse']) ?></p>

    <?php require_once __DIR__ . '/templates/footer.php'; ?>
