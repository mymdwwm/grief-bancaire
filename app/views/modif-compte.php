<?php require_once __DIR__ . '/templates/header.php'; ?>


<div class="container mt-5">
        <h2>Modifier la tâche</h2>
        <form action="?action=update" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($client['id']) ?>">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($client['nom']) ?>" required>
            </div>
            <div>
                <label for="solde" class="">Solde :</label>
                <textarea class="" id="solde" name="solde" required><?= htmlspecialchars($client['solde']) ?></textarea>
            </div>
            <div>
                <label for="solde" class="">Solde :</label>
                <select name="" id="">

                </select>
            </div>
            

            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
        <a href="?id=<?= htmlspecialchars($client['id']) ?>&action=voir" class="btn btn-secondary mt-3">Annuler</a>
    </div>





<?php require_once __DIR__ . '/templates/footer.php'; ?>