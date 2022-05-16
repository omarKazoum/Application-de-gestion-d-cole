<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= css("content_style.css")?>">
    <link rel="stylesheet" href="<?= css('Normalize.css')?>">
    <link rel="stylesheet" href="<?= css('bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= css('style.css')?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Gestion d'école</title>
</head>

<body>
  <div class="container-fluid">
    <header class="row ">

      <!---Create navbar--->
      <?php require_once "navbar.php" ?>
      <!------Header------>
    </header>
    <main class="row pt-2">
      <!--Sidebar of all page-->
      <div class="col-2 col-lg-1">
        <?php require_once "sidebar.php" ?>
      </div>
      <div class="content col-10 col-lg-11">
        <!--Content of laoding page--->
        <?= $page_content ?>
      </div>
    </main>
  </div>
  <script src="<?= js('bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= js('script.js') ?>"></script>
  <script src="<?= js('sweetalert2.js') ?>"></script>
  <script src="<?= js('popper.min.js') ?>"></script>
  <script src="<?= js('assets/js/script.js') ?>"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script>
  $(document).on('click', 'ul li', function() {
    $(this).addClass('active').siblings().removeClass('active')
  })
  </script>
</body>

</html>