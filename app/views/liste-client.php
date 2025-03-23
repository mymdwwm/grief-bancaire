

<?php
if (!isset($_SESSION['username'])) {
    header('Location: index.php?action=login');
    exit;
}
?>

<?php require_once __DIR__ . '/templates/header.php'; ?>





<?php
// affiche un message à l'ajout d'un client 
if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div class="alert alert-success">
        Le client <?= htmlspecialchars($_GET['nom']) ?> <?= htmlspecialchars($_GET['prenom']) ?> a bien été ajouté.
    </div>


    if (isset($_GET['update']) && $_GET['update'] == 1): ?>
    <div class="alert alert-info">
        Le client <?= htmlspecialchars($_GET['nom']) ?> <?= htmlspecialchars($_GET['prenom']) ?> a bien été modifié.
    </div>


    
<?php if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}
?>

    

<?php endif; ?>



<?php if (!empty($clients)): ?>
    <div class="container mt-6">
        <h2 class="mb-4">Liste des clients</h2>
        <?php require_once __DIR__ . '/templates/lien.php' ?>
        <hr>
        <p><strong>Total de clients :</strong> <?= htmlspecialchars($totalClients); ?></p>
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                <th>N°</th>
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
                    <td><?= htmlspecialchars($client['id_client']) ?></td>
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
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client et ses comptes associés ?')">
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