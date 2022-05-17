<div class="d-flex justify-content-between mt-2">
    <h3 class="">Parents list</h3>
    <a href="<?= getUrlFor('formaddparente')?> " class="btn btn-primary">Add New Parent</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Matricule</th>
      <th scope="col">Nom copmlet</th>
      <th scope="col">Genre</th>
      <th scope="col">Job</th>
      <th scope="col">Adresse</th>
      <th colspan="2"></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data as $p){?>
    <tr>
      <td><?= $p->matricule?></td>
      <td><?= $p->nom_complet?></td>
      <td><?= $p->genre?></td>
      <td><?= $p->job?></td>
      <td><?= $p->adresse?></td>
      <td><a href="<?= getUrlFor('parentdelete?id='.$p->id)?>" class="btn btn-danger">delete</a>
          <a href="<?= getUrlFor('parentupdate?id='.$p->id)?>" class="btn btn-success">edit</a>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>