<div class="d-flex justify-content-between border-bottom-1 mb-2">
  <h3 class="">Classes list <?= isset($isSearching) ? 'results of "' . $_GET['word'].'"' : '' ?></h3>
  <a href="<?= getUrlFor('classes/add') ?>" class="btn btn-primary"> add class</a>
</div>

<table class="table">

  <tbody>
    <?php if (!$classes) { ?>
            <div class="alert alert-danger">
                no classes found! clcik <a href="<?= getUrlFor('classes/add')?>" class="lick text-decoration-none">here</a> to add a class
            </div>

    <?php } else{?>
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col" ></th>
    </tr>
    </thead>
    <?php  foreach ($classes as $class) {?>
          <tr>
              <th scope="row"><?= $class->id?></th>
              <td><?= $class->name?></td>
              <td><?= $class->description?></td>
              <td><a href="<?= getUrlFor('classes/delete/'.$class->id) ?>" class="btn btn-danger">Delete</a><a href="<?= getUrlFor('classes/edit/'.$class->id)?>" class="btn btn-success ms-1">Edit</a></td>
          </tr>
    <?php }

    }?>
  </tbody>
</table>