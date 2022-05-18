<div class="d-flex w-100%">
  <h3 class="mt-2">Classes list</h3>
  <div class="me-0 mx-auto">
    <a href="<?= getUrlFor('Professeurs/add'); ?>" class="btn btn-primary" id="btn_addProf">Add Prof</a>
  </div>
</div>
<?php if (isset($_GET['msg'])) { ?>
<div class="alert alert-success">
  <?= $_GET['msg'] ?>
</div>
<?php } ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Matricule</th>
      <th scope="col">Nom Complet</th>
      <th scope="col">Genre</th>
      <th scope="col">Class_id </th>
      <th scope="col">Matiere</th>
      <th scope="col">Phone</th>
      <th scope="col">Operateurs</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ListProf as $Prof) { ?>
    <tr>
      <th scope="row"><?= $Prof->id ?></th>
      <td><?= $Prof->Matricule ?></td>
      <td><?= $Prof->Nom_complet ?></td>
      <td><?= $Prof->Genre ?></td>
      <td><?= $Prof->Class_id ?></td>
      <td><?= $Prof->Matiere ?></td>
      <td><?= $Prof->Phone ?></td>
      <td>
        <a href="<?= getUrlFor('Professeur/Edit') ?>" class="btn btn-success">Edit</a>
        <a href="<?= getUrlFor('Professeur/Delete') ?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>