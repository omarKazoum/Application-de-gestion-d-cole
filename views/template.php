<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= css('Normalize.css')?>">
    <link rel="stylesheet" href="<?= css('bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= css('style.css')?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?= css('animate.min.css')?>"> -->
    <title>Gestion d'école</title>
</head>
<body>
    <div class="containner-fluid">
        <header class="row">
            <!---Create navbar--->
            <?php require_once "navbar.php" ?>
            <!------Header------>
        </header>
        <main class="row">
            <aside class="col-1 col-md-2 bg-success">
                <!--Sidebar of all page-->
                <?php require_once "sidebar.php" ?>
            </aside>
            <div class="content col-11 col-md-10">
                <!--Content of laoding page--->
                <?= $page_content ?>
            </div>
        </main>
    </div>
    <script src="<?= js('bootstrap.bundle.min.js')?>"></script>
    <script src="<?= js('script.js')?>"></script>
    <script src="<?= js('sweetalert2.js')?>"></script>
</body>
</html>