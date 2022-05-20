<h3 class="mt-2">Update Parent</h3>
<hr>
<?php
    if (isset($error)) { ?>
        <div class="alert alert-danger col-8 mx-auto">
            <strong>
                <?= $error ?>
            </strong>
        </div>
<?php } ?>

<div class="col-8 mx-auto">
    <form method="POST" action="<?= getUrlFor('parentsubmitupdate')?>" class="needs-validation" novalidate>
        <input type="hidden" name="id" value="<?= $par->id??$_POST['id']?>">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Matricule</label>
            <input type="text" name="matricule" value="<?= $par->matricule??$_POST['matricule']??''?>" class="form-control" required>
            <span class="invalid-feedback">*Please choose a matricule*</span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nom Complet</label>
            <input type="text" name="nom_complet" value="<?= $par->nom_complet??$_POST['nom_complet']??''?>" class="form-control" required>
            <span class="invalid-feedback">*Please choose a username.*</span>
        </div>
        <div class="mb-3">
                
            <label for="exampleInputPassword1" class="form-label">Genre</label>
            <input type="text" name="genre" value="<?= $par->genre??$_POST['genre']??''?>" class="form-control" pattern="^homme$|^femme$" required>
            <span class="invalid-feedback">*Please choose a genre*</span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Job</label>
            <input type="text" name="job" value="<?= $par->job??$_POST['job']??''?>" class="form-control" required>
            <span class="invalid-feedback">*Please choose a job*</span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">adresse</label>
            <textarea name="adresse" class="form-control" required><?= $par->adresse??$_POST['adresse']??''?></textarea>
            <span class="invalid-feedback">*Please choose a Adresse*</span>
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="exampleCheck1">Phone</label>
            <input type="number" name="phone" value="<?= $par->phone??$_POST['phone']??''?>" class="form-control" required>
            <span class="invalid-feedback">*Please choose a phone*</span>
        </div>
        <button type="submit" id="btn_addProf" class="btn">Submit</button>
    </form>
</div>
<script src="<?= js('bootstrapvalidation.js') ?>"></script>