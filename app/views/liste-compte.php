<?php require_once __DIR__ . '/templates/header.php'; ?>

<?php
require_once __DIR__ . '/../model/compte.php'; // Vérifie que le modèle est bien inclus
// echo "📂 Fichier compte.php bien chargé !<br>"; // Debugging

?>


<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['message'];
        unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>

<?php if (!empty($comptes)): ?>
    <div class="container mt-6">
        <h2 class="mb-4">Liste des Comptes</h2>

        <?php require_once __DIR__ . '/templates/lien.php' ?>
        <hr>
        <p><strong>Total de comptes :</strong> <?= htmlspecialchars($totalComptes); ?></p>
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>N° Compte</th>
                    <th>RIB</th>
                    <th>Type</th>
                    <th>Solde</th>
                    <th>Client</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($comptes as $compte): ?>
                    <tr>

                        <td><?= htmlspecialchars($compte['id_compte']) ?></td>
                        <td><?= htmlspecialchars($compte['rib']) ?></td>
                        <td><?= htmlspecialchars($compte['type_compte']) ?></td>
                        <td><?= htmlspecialchars($compte['solde_compte']) ?></td>
                        <td><?= htmlspecialchars($compte['id_client']) ?></td>
                        <td>
                            <a href="index.php?id=<?= htmlspecialchars($compte['id_compte']) ?>&action=voir"
                                class="btn btn-info btn-sm">Voir</a>
                            <a href="index.php?id=<?= htmlspecialchars($compte['id_compte']) ?>&action=supprimer-compte"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <p style="text-align: center;">Aucun compte trouvée.</p>
<?php endif; ?>


<?php require_once __DIR__ . '/templates/footer.php'; ?>