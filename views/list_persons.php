<a href="<?= getUrlFor('personAdd')?> " class="btn btn-success">add</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">last name</th>
        <th scope="col">age</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $person){?>
    <tr>
        <th scope="row"><?= $person->id?></th>
        <td><?= $person->name?></td>
        <td><?= $person->last_name?></td>
        <td><?= $person->age?></td>
        <td>
            <a href="<?= getUrlFor('deletePer?id='.$person->id)?>" class="btn btn-danger">Delete</a>
            <a href="<?= getUrlFor('editPer?id='.$person->id)?>" class="btn btn-success">Edit</a>
        </td>
    </tr>
  <?php }?>
    </tbody>
</table>