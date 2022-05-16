<form method="POST" action="<?= getUrlFor('personAddSubmit')?>">
    <div class="form-group">
        <label for="user_name">name</label>
        <input type="text" name="name" class="form-control" id="user_name" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="last_name">last name</label>
        <input type="text" name="last_name" class="form-control" id="last_name" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="age">age</label>
        <input type="number" name="age" class="form-control" id="age" aria-describedby="emailHelp" >
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>