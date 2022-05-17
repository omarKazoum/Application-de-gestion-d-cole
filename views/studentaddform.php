<form method="POST" action="<?= getUrlFor('personAddSubmit')?>">
    <div class="form-group">
        <label for="matricule">matricule</label>
        <input type="text" name="matricule" class="form-control" id="matricule" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="name">name</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="gender">gender</label>
        <input type="text" name="gender" class="form-control" id="gender" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="class">class</label>
        <input type="number" name="id_class" class="form-control" id="class" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="parent">parent</label>
        <input type="text" name="id_parent" class="form-control" id="parent" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="adresse">adresse</label>
        <input type="text" name="adresse" class="form-control" id="adresse" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="birthday">birthday</label>
        <input type="text" name="birthday" class="form-control" id="birthday" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="parentname">parent name</label>
        <input type="text" name="parent_name" class="form-control" id="parentname" aria-describedby="emailHelp" >
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>