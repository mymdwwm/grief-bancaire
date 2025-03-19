<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5">
    <h2>Détails du client</h2>
    <p><strong>Nom :</strong> <?= htmlspecialchars($task['nom']) ?></p>
    <p><strong>Prenom :</strong> <?= nl2br(htmlspecialchars($task['prenom'])) ?></p>
    <p><strong>Email :</strong> <?= htmlspecialchars($task['email']) ?></p>
    <p><strong>Téléphone :</strong> <?= htmlspecialchars($task['telephone']) ?></p>
    <p><strong>Adresse :</strong> <?= htmlspecialchars($task['adresse']) ?></p>

    <a href="?id=<?= htmlspecialchars($client['id']) ?>&action=modifier" class="">Modifier</a>
    <a href="?" class="btn btn-secondary">Retour à la liste</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
