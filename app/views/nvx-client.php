<?php require_once __DIR__ . '/templates/header.php'; ?>

<div id="card">
    <h2>Ajoutez un nouveau client</h2>
    <form action="?action=index.php?action=nvx-client" method="POST">
        <div class="">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="">
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="">
            <label for="email" class="form-label">Email :</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="">
            <label for="telephone" class="form-label">Téléphone :</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="">
            <label for="adresse" class="form-label">Adresse :</label>
            <textarea class="form-control" id="description" name="description" rows="2" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Ajouter le client</button>
    </form>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
