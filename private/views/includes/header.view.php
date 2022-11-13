<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/style.css">
    <title>Twirling Team Sparkle</title>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">



</head>
<body style=" background-color: #EEEEEE;">
<header class="header">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <div class="p-2">
                <div class=" navbar-brand  align-items-center">
                    <img src="http://localhost/Twirling-team-Sparkle/public/assets/Images/sparkle_twirling.png" class="img-logo">
                </div>
            </div>
            <div class="p-2">
                <form class="search-bar d-flex align-items-center" role="search">
                    <input class="form-control me-1 rounded-pill" type="search" placeholder="Search here" aria-label="Search">
                </form>
            </div>
            <div class="ms-auto p-2">
                <div class='c-avatar'>
                    <img class='c-avatar__image' src='https://images.unsplash.com/photo-1542103749-8ef59b94f47e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80' alt=''>
                    <span class='c-avatar__status'></span>
                </div>
            </div>
            <div class="">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown"">
                        <a style="color: #EEEEEE" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=Auth::getVoornaam() ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end mt-4" aria-labelledby="navbarDropdownMenuLink" style="background: #EEEEEE"  >
                            <a class="dropdown-item" href="<?=ROOT?>/profile">Profile</a>
                            <a class="dropdown-item" href="<?=ROOT?>">Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=ROOT?>/logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
-->
</header>
