<?php require_once __DIR__ . '/templates/header.php'; ?>


<?php if (!empty($clients)):  ?>
    <div class="container mt-6">
    <h2 class="mb-4">Liste des clients</h2>
    <a href="index.php?action=create">Ajouter un client</a>
    <table class="table table-striped table-bordered">
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
                    
                    <td><?= htmlspecialchars( $client['nom']) ?></td>
                    <td><?= htmlspecialchars($client['prenom']) ?></td>
                    <td><?= htmlspecialchars($client['email_client']) ?></td>
                    <td><?= htmlspecialchars($client['telephone']) ?></td>
                    <td><?= htmlspecialchars($client['adresse']) ?></td>
                    <td>
                    <a href="index.php?id=<?= htmlspecialchars($client['id'], ENT_QUOTES, 'UTF-8') ?>&action=voir" class="btn btn-primary">Voir</a>
                        <a href="?id=<?= $client['id'] ?>&action=modifier" class="">Modifier</a>
                        <a href="?id=<?= $client['id'] ?>&action=supprimer" 
                           class=""
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