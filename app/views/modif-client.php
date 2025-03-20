<?php require_once __DIR__ . '/templates/header.php'; ?>


<div class="container mt-5">
        <h2>Modifier le coordonnées clients</h2>
        <form action="index.php?action=update&id=<?= htmlspecialchars($client['id']) ?>" method="POST">

            <input type="hidden" name="id" value="<?= htmlspecialchars($client['id']) ?>">
            
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($client['nom']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= htmlspecialchars($client['prenom']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="email_client" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email_client" name="email_client" value="<?= htmlspecialchars($client['email_client']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone :</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="<?= htmlspecialchars($client['telephone']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse :</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="<?= htmlspecialchars($client['adresse']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="solde" class="form-label">Solde :</label>
            <input type="number" class="form-control" id="solde" name="solde" value="<?= htmlspecialchars($client['solde']) ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Modifier</button>
    </form>


    <!-- NON pour retour a l'acceuil -->
        <a href="?page=index.php" class="btn btn-secondary mt-3">Annuler</a>
    </div>





<?php require_once __DIR__ . '/templates/footer.php'; ?>