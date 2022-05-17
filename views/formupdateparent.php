<?php if(isset($msg)){?>
    <div class="alert alert-danger">
        <ul>
        <?= $msg ?>
        </ul>
    </div>
<?php } ?>
<div class="col-8 mx-auto">
    <form method="POST" action="<?= getUrlFor('parentsubmitupdate')?>">
        <input type="hidden" name="id" value="<?= $par->id?>">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Matricule</label>
            <input type="text" name="matricule" value="<?= $par->matricule?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nom Complet</label>
            <input type="text" name="nom_complet" value="<?= $par->nom_complet?>" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <select name="" id="">
                <option value=""></option>
                <option value=""></option>
            </select>
            <label for="exampleInputPassword1" class="form-label">Genre</label>
            <input type="text" name="genre" value="<?= $par->genre?>" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Job</label>
            <input type="text" name="job" value="<?= $par->job?>" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">adresse</label>
            <input type="text" name="adresse" value="<?= $par->adresse ?>" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="exampleCheck1">Phone</label>
            <input type="number" name="phone" value="<?= $par->phone?>" class="form-control" id="exampleCheck1">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
            
    </form>
</div>