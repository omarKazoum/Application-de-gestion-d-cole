<div class="d-flex justify-content-between mt-2">
    <h3 class="">Parents list</h3>
    <a href="<?= getUrlFor('formaddparente')?> " class="btn btn-primary">Add New Parent</a>
</div>

<?php if (isset($_GET['msg'])) { ?>
  <div class="alert alert-success mt-2">
    <?= $_GET['msg'] ?>
  </div>
<?php } ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Matricule</th>
      <th scope="col">Nom copmlet</th>
      <th scope="col">Genre</th>
      <th scope="col">Job</th>
      <th scope="col">Adresse</th>
      <th scope="col">Phone</th>
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
      <td><?= $p->phone?></td>
      <td>
        <a href="<?= getUrlFor('parentdelete?id='.$p->id)?>" class="btn btn-danger btn-delete">delete</a>
        <a href="<?= getUrlFor('parentupdate?id='.$p->id)?>" class="btn btn-success">edit</a>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
<script>
    
</script>