<div class="d-flex justify-content-between">
<<<<<<< Updated upstream
  <h3 class="mt-2">Classes list</h3>
  <a href="<?= getUrlFor('classes/add') ?>" class="btn btn-primary"> add class</a>
=======
    <h3 class="mt-2">Classes list <?= isset($isSearching)?'results of '.$_GET['word']:'' ?></h3>
    <a href="<?= getUrlFor('classes/add')?>" class="btn btn-primary"> add class</a>
>>>>>>> Stashed changes
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col" colspan="2"></th>
    </tr>
<<<<<<< Updated upstream
  </thead>
  <tbody>
    <?php if (count($classes) > 0) foreach ($classes as $class) { ?>
    <tr>
      <th scope="row"><?= $class->id ?></th>
      <td><?= $class->name ?></td>
      <td><?= $class->description ?></td>
      <td><a href="<?= getUrlFor('classes/delete/' . $class->id) ?>" class="btn btn-danger">Delete</a></td>
      <td><a href="<?= getUrlFor('classes/edit/' . $class->id) ?>" class="btn btn-success">Edit</a></td>
=======
    </thead>
    <tbody>
    <?php if(!$classes){?>
        <div class="alert alert-danger">
            no classes found!
        </div>

    <?php }else
    foreach($classes as $class){
        //TODO:: [] array problem
        ?>
    <tr>
        <th scope="row"><?= $class->id?></th>
        <td><?= $class->name?></td>
        <td><?= $class->description?></td>
        <td><a href="<?= getUrlFor('classes/delete/'.$class->id)?>" class="btn btn-danger">Delete</a></td>
        <td><a href="<?= getUrlFor('classes/edit/'.$class->id)?>" class="btn btn-success">Edit</a></td>
>>>>>>> Stashed changes
    </tr>
    <?php }
        if (isset($_GET['success'])) : ?>
    <div class="alert alert-success">
      <?= htmlspecialchars($_GET['success']) ?>
    </div>
    <?php endif ?>
  </tbody>
</table>