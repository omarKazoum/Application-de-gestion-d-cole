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
                <input type="text" name="matricule"  value="<?= $_POST['matricule'] ?? '' ?>"  class="form-control" required>
                <span class="invalid-feedback">*Please choose a matricule*</span>
            </div>
            <div class="mb-3 col">
                <label for="exampleInputPassword1" class="form-label">Nom Complet</label>
                <input type="text" name="nom_complet" value="<?= $_POST['nom_complet'] ?? '' ?>"class="form-control" required>
                <span class="invalid-feedback">*Please choose a username.*</span>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Genre</label>
            <input type="text" name="genre" value="<?= $_POST['genre'] ?? '' ?>" class="form-control" pattern="^homme$|^femme$" required>
            <span class="invalid-feedback">*Please choose a genre*</span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Job</label>
            <input type="text" name="job" value="<?= $_POST['job'] ?? '' ?>" class="form-control" required>
            <span class="invalid-feedback">*Please choose a job*</span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">adresse</label>
            <input type="text" name="adresse" value="<?= $_POST['adresse'] ?? '' ?>" class="form-control" pattern="^[a-zA-Z0-9\s\,\''\-]*$" required>
            <span class="invalid-feedback">*Please choose a Adresse*</span>
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="exampleCheck1">Phone</label>
            <input type="tel" name="phone" value="<?= $_POST['phone'] ?? '' ?>" class="form-control" required>
            <span class="invalid-feedback">*Please choose a phone*</span>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
            
    </form>
</div>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>