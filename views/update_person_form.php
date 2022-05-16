<?php if(isset($msg)){?>
    <div class="alert alert-danger">
        <ul>
        <?= $msg ?>
        </ul>
    </div>
<?php } ?><form method="POST" action="<?= getUrlFor('personUpdateSubmit')?>">
    <input type="hidden" name="id" value="<?= $per->id ?>">

    <div class="form-group">
        <label for="user_name">name</label>
        <input type="text" value='<?= $per->name ?>' name="name" class="form-control" id="user_name" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="last_name">last name</label>
        <input type="text" value='<?= $per->last_name ?>' name="last_name" class="form-control" id="last_name" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="age">age</label>
        <input type="number" name="age" value='<?= $per->age ?>' class="form-control" id="age" aria-describedby="emailHelp" >
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>