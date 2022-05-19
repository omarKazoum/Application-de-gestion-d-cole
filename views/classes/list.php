<div class="d-flex justify-content-between">
  <h3 class="mt-2">Classes list <?= isset($isSearching) ? 'results of ' . $_GET['word'] : '' ?></h3>
  <a href="<?= getUrlFor('classes/add') ?>" class="btn btn-primary"> add class</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col" colspan="2"></th>
    </tr>
  </thead>
  <tbody>
    <?php //if (!$classes) { ?>
    <div class="alert alert-danger">
      no classes found!
    </div>

    <?php //} else
      //foreach ($classes as $class) {
        //TODO:: [] array problem
    ?>
    <?php //endif ?>
  </tbody>
</table>