
<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-4">
    <h2>Ajouter un Compte</h2>
    <form action="index.php?action=new-compte" method="post">
        <div class="mb-3">
            <label for="rib" class="form-label">RIB :</label>
            <input type="text" class="form-control" name="rib" required>
        </div>
        <div class="mb-3">
            <label for="type_compte" class="form-label">Type :</label>
            <select class="form-control" name="type_compte" required>
                <option value="Compte courant">Compte courant</option>
                <option value="Compte épargne">Compte épargne</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="solde_compte" class="form-label">Solde :</label>
            <input type="number" class="form-control" name="solde_compte" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="id_client" class="form-label">ID Client :</label>
            <input type="number" class="form-control" name="id_client" required>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
