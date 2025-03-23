

<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2>Ajouter un Contrat</h2>

<form action="index.php?action=ajouter-contrat" method="post">
    <label>Type de contrat :</label>
    <select name="type_contrat" class="form-control" id="type_contrat" required>
        <option value="Assurance Habitation">Assurance Habitation</option>
        <option value="Crédit Immobilier">Crédit Immobilier</option>
        <option value="Crédit à la Consommation">Crédit à la Consommation</option>
        <option value="Compte Épargne Logement">Compte Épargne Logement</option>
    </select>
    <br>

    <label for="montant" class="form-label">Montant (€)</label>
        <input type="" name="montant" id="montant" class="form-control" required>
<br>
        <label for="duree" class="form-label">Durée</label>
<select  name="duree" id="duree" class="form-control" required>
    <option value="1">1 mois</option>
    <option value="6">6 mois</option>
    <option value="12">12 mois</option>
    <option value="24">24 mois</option>
</select>
<br>
<label for="id_client" class="form-label">ID Client</label>
<input type="" name="id_client" id="id_client" class="form-control" required>
<br>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
