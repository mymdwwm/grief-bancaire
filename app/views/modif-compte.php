<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5">
    <h2>Modifier les informations du compte</h2>

    <form action="index.php?action=update&id=<?= htmlspecialchars($compte['id']) ?>" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($compte['id']) ?>">

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du compte :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($compte['nom']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="solde" class="form-label">Solde :</label>
            <input type="number" class="form-control" id="solde" name="solde" value="<?= htmlspecialchars($compte['solde']) ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Modifier</button>
    </form>

    <a href="index.php?action=voir&id=<?= htmlspecialchars($compte['id']) ?>" class="btn btn-secondary mt-3">Annuler</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
