<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5">
    <h2>Détails du compte</h2>
    <p><strong>N° de compte :</strong> <?= htmlspecialchars($compte['id_compte']) ?></p>
    <p><strong>RIB :</strong> <?= htmlspecialchars($compte['rib']) ?></p>
    <p><strong>Type de compte:</strong> <?= nl2br(htmlspecialchars($compte['type_compte'])) ?></p>
    <p><strong>Solde sur le compte :</strong> <?= htmlspecialchars($compte['solde_compte']) ?></p>
    <p><strong>Référence client :</strong> <?= htmlspecialchars($compte['id_client']) ?></p>

    <a href="index.php?action=liste-compte" class="btn btn-primary">Retour</a>
    

    <?php require_once __DIR__ . '/templates/footer.php'; ?>
