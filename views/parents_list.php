<div class="d-flex justify-content-between mt-2">
    <h3 class="">Parents list <?= isset($_GET['word'])?'results of '.$_GET['word']:'' ?></h3>
    <a href="<?= getUrlFor('formaddparente')?> " id="btn_addProf" class="btn">Add New Parent</a>
</div>
<hr>

<?php if (isset($_GET['msg'])) { ?>
  <div class="alert alert-success mt-2">
    <?= $_GET['msg'] ?>
  </div>
<?php } ?>

<?php
  if (isset($_GET['up'])) {
    $up=$_GET['up'];
    echo '<div class="alert alert-success mt-2">
            '.$up.'
          </div>';
  }
?>
<div class="overflow-auto">
  <table class="table text-nowrap">
    <thead>
      <tr>
        <th scope="col">Matricule</th>
        <th scope="col"class="text-nowrap">Nom copmlet</th>
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
        <td class="d-flex justify-content-end">
          <a href="<?= getUrlFor('parentdelete?id='.$p->id)?>" class="btn btn-danger btn-delete">delete</a>
          <a href="<?= getUrlFor('parentupdate?id='.$p->id)?>" class="btn btn-success ms-1">edit</a>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>
<script>
    
</script>