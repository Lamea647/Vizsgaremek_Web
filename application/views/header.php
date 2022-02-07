<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Önkéntes Portál</title>
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a356d36430.js" crossorigin="anonymous"></script>

    <!-- Saját stíluslap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">

</head>
<body>
    <div class="container">
        <header>
            <div class="col"><img src="images/logo.jpg" alt="weboldal logo" style="border-radius: 10px;"></div>
        </header>
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
                <ul class="navbar-nav">
                    <li class="nav-item" id="fooldal">
                        <a class="nav-link" href="<?php echo base_url(); ?>">Főoldal</a>
                    </li>
                    <li class="nav-item" id="bejelentkezes">
                        <a class="nav-link" href="<?php echo base_url(); ?>bejelentkezes">Bejelentkezés</a>
                    </li>
                    <li class="nav-item" id="regisztracio">
                        <a class="nav-link" href="<?php echo base_url(); ?>regisztracio">Regisztráció</a>
                    </li>
                </ul>
        </nav>