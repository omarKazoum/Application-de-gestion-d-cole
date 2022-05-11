<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= css('Normalize.css')?>">
    <link rel="stylesheet" href="<?= css('bootstrap.min.css')?>">
    <title>Document</title>
</head>
<body>
<form class="container w-50 mt-5" method="POST">
    <h1 class="m-3">Admin Login</h1>
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" required name="email" id="form2Example1" class="form-control" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" required name="password" id="form2Example2" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

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