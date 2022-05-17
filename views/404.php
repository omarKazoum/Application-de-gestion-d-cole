<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Error</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>

    <main>
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-10 col-10 mt-5">
                    <img src="<?php echo img('oops.svg'); ?>" class="mt-lg-5" alt="">
                    <p class="fs-3 mt-2">We can’t seem to find a page you are looking for </p>
                    <a href="<?php echo getUrlFor('admin/login')?>" class="btn mt-2 text-white px-3" style="border-radius: 14px 14px 0px; background-color: #FF735F;">Back to home</a>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-10 mx-auto mt-5 justify-content-center">
                    <img src="<?php echo img('404.svg'); ?>" alt="">
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
