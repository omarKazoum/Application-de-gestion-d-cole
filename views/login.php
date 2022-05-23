<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= css('Normalize.css')?>">
    <link rel="stylesheet" href="<?= css('bootstrap.min.css')?>">

    <link rel="stylesheet" href="<?= css("content_style.css")?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= css('style.css')?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<form class="container w-50 mt-5 form-group" method="POST">
    <h1 class="m-3 text-center">Admin Login</h1>
  <!-- Email input -->
  <div class="input-group m-5 w-50 mx-auto">
    <span class="input-group-text" id="basic-addon1">
    <i class="bi bi-person-fill"></i>
    </span>
    <input type="text" name="email" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="basic-addon1">
  </div>

  <div class="input-group m-5 w-50 mx-auto">
    <span class="input-group-text" id="basic-addon1">
    <i class="bi bi-key-fill"></i>
    </span>
    <input type="password" name="password" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="basic-addon1">
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4 w-50 d-block mx-auto">Sign in</button>

  <?php
    if (isset($err)){
        echo '
            <div class="alert alert-danger" role="alert">
            Email ou password invalid
            </div>
        ';
    }
  ?>
</form>
</body>
</html>