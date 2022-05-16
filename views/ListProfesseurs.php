<h3 class="mt-2">Classes list</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Matricule</th>
      <th scope="col">Nom_complet</th>
      <th scope="col">Genre</th>
      <th scope="col">Class_id </th>
      <th scope="col">Matiere</th>
      <th scope="col">Phone</th>
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
    </tr>
    <?php } ?>
  </tbody>
</table>