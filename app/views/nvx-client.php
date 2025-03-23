<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php?action=login');
    exit;
}
?>

<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5">
    <h2>Ajoutez un nouveau client</h2>
    <form action="index.php?action=save-client" method="POST">

        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" required>

        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone :</label>
            <input type="text" class="form-control" id="telephone" name="telephone" required>
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse :</label>
            <textarea class="form-control" id="adresse" name="adresse" rows="2" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Ajouter le client</button>
    </form>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
