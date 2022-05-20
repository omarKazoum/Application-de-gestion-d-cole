<div class="d-flex justify-content-between mt-2">
    <h3 class="">Student list <?= isset($_GET['word']) ? 'results of "' . $_GET['word'].'"' : '' ?></h3>
    <a href="<?= getUrlFor('formaddstudent')?> " class="btn btn-primary">Add New Student</a>
</div>
<?php if (!$data) { ?>
<div class="alert alert-danger">
    no classes found! clcik <a href="<?= getUrlFor('student')?>" class="lick text-decoration-none">here</a> to add a
    class
</div>

<?php } else{?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Matricule</th>
            <th scope="col">Nom copmlet</th>
            <th scope="col">Genre</th>
            <th scope="col">class</th>
            <th scope="col">parent id</th>
            <th scope="col">adresse</th>
            <th scope="col">birthday</th>
            <th scope="col">email</th>
            <th scope="col">parent name</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $s){?>
        <tr>
            <td><?= $s->matricule?></td>
            <td><?= $s->name?></td>
            <td><?= $s->gender?></td>
            <td><?= $s->id_class?></td>
            <td><?= $s->id_parents?></td>
            <td><?= $s->adresse?></td>
            <td><?= $s->birthday?></td>
            <td><?= $s->email?></td>
            <td><?= $s->parent_name?></td>
            <td><a href="<?= getUrlFor('studentdelete?id='.$s->id)?>" class="btn btn-danger">delete</a>
                <a href="<?= getUrlFor('studentupdate?id='.$s->id)?>" class="btn btn-success">edit</a>
            </td>
        </tr>
        <?php }
          }?>
    </tbody>
</table>