
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php?action=login');
    exit;
}
?>


<?php require_once __DIR__ . '/templates/header.php'; ?>


<?php if (!empty($contrats)): ?>
    <div class="container mt-6">
        <h2 class="mb-4">Liste des Contrats</h2>
        <?php require_once __DIR__ . '/templates/lien.php' ?>
        <hr>
        <p><strong>Total de contrats :</strong> <?= htmlspecialchars($totalContrats); ?></p>

        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Montant (€)</th>
                    <th>Durée (mois)</th>
                    <th>ID Client</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contrats as $contrat): ?>
                    <tr>

                        <td><?= htmlspecialchars($contrat['id_contrat']) ?></td>
                        <td><?= htmlspecialchars($contrat['type_contrat']) ?></td>
                        <td><?= htmlspecialchars($contrat['montant']) ?></td>
                        <td><?= htmlspecialchars($contrat['duree']) ?></td>
                        <td><?= htmlspecialchars($contrat['id_client']) ?></td>
                        <td>
                            <a href="index.php?id=<?= htmlspecialchars($contrat['id_contrat']) ?>&action=voir-contrat"
                                class="btn btn-info btn-sl">Voir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <p style="text-align: center;">Aucun contrat trouvé.</p>
<?php endif; ?>


<?php require_once __DIR__ . '/templates/footer.php'; ?>