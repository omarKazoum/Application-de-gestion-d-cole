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
    <title>Contact List</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" id="NAVBAR_PAGE_NAVBAR">
        <div class="container">
            <a class="navbar-brand" id="LOGO" href="index.php">
                <img src="<?= \img('logo1.png')?>" alt="logo website" id="LOGO_WEBSITE">
            </a>
            <!----Button menu--->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"
                aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation"
                style="background-color: #FF8303;">
                <!-------icon menu--->
                <span class="navbar-toggler-icon"></span>
            </button>
            <!----Content navbar--->
            <div class="collapse navbar-collapse" id="navmenu">
                <!--Input search group -->
                <div class="input-group d-flex justify-content-end border-none">
                    <input type="text" class="form-md shadow" placeholder="Search"
                        aria-label="Search" aria-describedby="basic-addon2" id="INPUT_SEARCH">
                    <div class="input-group-append">
                        <button class="btn " type="button" id="BUTTON_SEARCH"><i id="ICON_SEARCH" class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </nav>




    <script src="<?= js('bootstrap.bundle.min.js')?>"></script>
    <script src="<?= js('script.js')?>"></script>
    <script src="<?= js('sweetalert2.js')?>"></script>
</body>

</html>