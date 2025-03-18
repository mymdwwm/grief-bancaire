<?php require_once __DIR__ . '/templates/header.php'; ?>


<?php if (!empty($clients)):  ?>
    <div>
    <h2>Liste des clients</h2>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Adresse</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= htmlspecialchars(string: $client['nom']) ?></td>
                    <td><?= htmlspecialchars($client['prenom']) ?></td>
                    <td><?= htmlspecialchars($client['email']) ?></td>
                    <td><?= htmlspecialchars($client['telephone']) ?></td>
                    <td><?= htmlspecialchars($client['adresse']) ?></td>
                    <td>
                        <a href="?id=<?= $client['id'] ?>&action=voir" class="btn btn-info btn-sm">Voir</a>
                        <a href="?id=<?= $client['id'] ?>&action=modifier" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="?id=<?= $client['id'] ?>&action=supprimer" 
                           class="btn btn-danger btn-sm"
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