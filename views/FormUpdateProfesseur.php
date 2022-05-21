<?php
if (isset($error)) { ?>
<div class="alert alert-danger">
  <ul>
    <?= $error ?>
  </ul>
</div>

<?php } ?>
<form method="POST" action="<?= getUrlFor('Professeurs/edit/' . $prof->id) ?>" novalidate>
  <div class="form-group my-3">
    <label for="Matricule">Matricule</label>
    <input type="text" value="<?= $prof->Matricule ?? $_POST['Matricule'] ?? '' ?>" name="Matricule"
      class="form-control" id="Matricule" aria-describedby="textHelp" required>
    <span class="invalid-feedback">
      Please provide a valid Matricule.
    </span>
  </div>
  <div class="form-group my-3">
    <label for="Nom_complet">Nom Complet</label>
    <input type="text" value="<?= $prof->Nom_complet ?? $_POST['Nom_complet'] ?? '' ?>" name="Nom_complet"
      class="form-control" id="Nom_complet" aria-describedby="textHelp" required>
    <span class="invalid-feedback">
      Please provide a valid Nom Complet.
    </span>
  </div>
  <div class="form-group my-3">
    <label for="Genre">Genre</label>
    <input type="text" value="<?= $prof->Genre ?? $_POST['Genre'] ?? '' ?>" name="Genre" class="form-control" id="Genre"
      aria-describedby="textHelp" required>
    <span class="invalid-feedback">
      Please provide a valid Genre.
    </span>
  </div>
  <div class="form-group my-3">
    <label for="Class_id ">Class id </label>
    <input type="number" value="<?= $prof->Class_id ?? $_POST['Class_id'] ?? '' ?>" name="Class_id" class="form-control"
      id="Class_id " aria-describedby="textHelp" required>
    <span class="invalid-feedback">
      Please provide a valid Class id.
    </span>
  </div>
  <div class="form-group my-3">
    <label for="Matiere">Matiere</label>
    <input type="text" value="<?= $prof->Matiere ?? $_POST['Matiere'] ?? '' ?>" name="Matiere" class="form-control"
      id="Matiere" aria-describedby="textHelp" required>
  </div>
  <div class="form-group my-3">
    <label for="Phone">Phone</label>
    <input type="text" value="<?= $prof->Phone ?? $_POST['Phone'] ?? '' ?>" name="Phone" class="form-control" id="Phone"
      aria-describedby="textHelp" required>
    <span class="invalid-feedback">
      Please provide a valid Phone.
    </span>
  </div>
  <button type="submit" id="btn_submit_AddProf" class="btn btn-primary"> Save Edit </button>
</form>