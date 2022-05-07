<div class="d-flex justify-content-between">
    <h3 class="mt-2">Classes list</h3>
    <a href="<?= getUrlFor('classes/add')?>" class="btn btn-primary"> add class</a>
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
    <?php if(count($classes)>0)foreach($classes as $class){ ?>
    <tr>
        <th scope="row"><?= $class->getId()?></th>
        <td><?= $class->getName()?></td>
        <td><?= $class->getDescription()?></td>
        <td><a href="<?= getUrlFor('classes/delete/'.$class->getId())?>" class="btn btn-danger">Delete</a></td>
        <td><a href="<?= getUrlFor('classes/edit/'.$class->getId())?>" class="btn btn-success">Edit</a></td>
    </tr>
    <?php } if(isset($_GET['success'])): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars( $_GET['success'])?>
        </div>
    <?php endif ?>
    </tbody>
</table>