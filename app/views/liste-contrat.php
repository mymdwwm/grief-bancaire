<?php require_once __DIR__ . '/templates/header.php'; ?>


<?php if (!empty($clients)): ?>
    <div class="container mt-6">
        <h2 class="mb-4">Liste des Contrats</h2>
        <a href="index.php?action=ajouter-client" class="btn btn-success">Ajouter un client</a>

        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>

                        <td><?= htmlspecialchars($client['nom']) ?></td>
                        <td><?= htmlspecialchars($client['prenom']) ?></td>
                        <td><?= htmlspecialchars($client['email_client']) ?></td>
                        <td><?= htmlspecialchars($client['telephone']) ?></td>
                        <td><?= htmlspecialchars($client['adresse']) ?></td>
                        <td>
                            <a href="index.php?id=<?= htmlspecialchars($client['id_client']) ?>&action=voir"
                                class="btn btn-info btn-sm">Voir</a>
                            <a href="index.php?id=<?= htmlspecialchars($client['id_client']) ?>&action=modifier" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="index.php?id=<?= htmlspecialchars($client['id_client']) ?>&action=supprimer" class="btn btn-danger btn-sm"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <p style="text-align: center;">Aucun client trouvée.</p>
<?php endif; ?>


<?php require_once __DIR__ . '/templates/footer.php'; ?>