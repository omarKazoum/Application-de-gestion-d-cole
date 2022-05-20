<h3 class="mt-2">Add Parent</h3>
<hr>
<?php
    if (isset($errors)) { ?>
        <div class="alert alert-danger col-8 mx-auto">
            <strong>
                <?= $errors ?>
            </strong>
        </div>
<?php } ?>

<div class="col-8 mx-auto">

    <form method="POST" action="<?= getUrlFor('formsaveparente')?>" class="needs-validation" novalidate>
        <div class="row">
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Matricule</label>
                <input type="text" name="matricule"  value="<?= $_POST['matricule'] ?? '' ?>" placeholder="Entrer votre matricule" pattern="^\w{4,}$" class="form-control" required>
                <span class="invalid-feedback">*Please choose a matricule*</span>
            </div>
            <div class="mb-3 col">
                <label for="exampleInputPassword1" class="form-label">Nom Complet</label>
                <input type="text" name="nom_complet" value="<?= $_POST['nom_complet'] ?? '' ?>"placeholder="Entrer votre nom et prenom" pattern="^\w{5,}$" class="form-control" required>
                <span class="invalid-feedback">*Please choose a username.*</span>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Genre</label>
            <input type="text" name="genre" value="<?= $_POST['genre'] ?? '' ?>" class="form-control" placeholder="Entrer votre genre" pattern="^homme$|^femme$" required> 
            <span class="invalid-feedback">*Please choose a genre*</span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Job</label>
            <input type="text" name="job" value="<?= $_POST['job'] ?? '' ?>" placeholder="Entrer votre job" class="form-control" pattern="^\w{3,}$" required>
            <span class="invalid-feedback">*Please choose a job*</span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">adresse</label>
            <textarea name="adresse" class="form-control" placeholder="Entrer votre adresse" required><?= $_POST['adresse'] ?? '' ?></textarea>
            <span class="invalid-feedback">*Please choose a Adresse*</span>
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="exampleCheck1">Phone</label>
            <input type="tel" name="phone" value="<?= $_POST['phone'] ?? '' ?>" placeholder="Entrer votre number phone" class="form-control" required>
            <span class="invalid-feedback">*Please choose a phone*</span>
        </div>
        <div>
            <button type="submit" id="btn_addProf" class="btn">Ajouter</button>
        </div>
            
    </form>
</div>
<script src="<?= js('bootstrapvalidation.js') ?>"></script>
