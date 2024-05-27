<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= asset($webSettinge['icon']) ?>">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="<?= $webSettinge['description'] ?>">
    <!-- Meta Keyword -->
    <meta name="keywords" content="<?= $webSettinge['keywords'] ?>">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title><?= $webSettinge['title'] ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="<?= asset('public/app/css/linearicons.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/nice-select.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/owl.carousel.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/main.css') ?>">
    <style>
        .mostComment {
            width: 110px;
            height: 72px;
            border-radius: 9px;
        }
    </style>
</head>

<body>
    <header>

        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
                        <ul>
                            <li><a href="<?= $webSettinge['facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?= $webSettinge['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?= $webSettinge['telegram'] ?>"><i class="fa fa-telegram"></i></a></li>
                            <li><a href="<?= $webSettinge['instagram'] ?>"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
                        <ul>
                            <li>
                                <a href="tel:<?= $webSettinge['phone_number'] ?>">
                                    <span class="lnr lnr-phone-handset">salam</span>
                                    <span><?= $webSettinge['phone_number'] ?></span>
                                </a>
                            </li>
                            <li><a href="mailto:<?= $webSettinge['email_adres'] ?>"><span
                                        class="lnr lnr-envelope"></span><span><?= $webSettinge['email_adres'] ?></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-wrap">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
                        <a href="index.html">
                            <img class="img-fluid" src="img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
                        <img class="img-fluid" src="img/banner-ad.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container main-menu" id="main-menu">
            <div class="row align-items-center justify-content-between">
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <?php foreach ($menus as $menu) { ?>
                            <li class="menu-active">
                                <a href="<?= $menu['url'] ?>"><?= $menu['name'] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- #nav-menu-container -->
                <div class="navbar-right">
                    <form class="Search">
                        <input type="text" class="form-control Search-box" name="Search-box" id="Search-box"
                            placeholder="جستجو">
                        <label for="Search-box" class="Search-box-label">
                            <span class="lnr lnr-magnifier"></span>
                        </label>
                        <span class="Search-close">
                            <span class="lnr lnr-cross"></span>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </header>