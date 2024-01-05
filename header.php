<?php include "./api/config.php" ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- meta tag -->
    <meta charset="utf-8" />
    <title>NYB Coin - NFT Minting/Collection</title>
    <meta name="description" content="" />
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.html" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.jpg" />
    <!-- Bootstrap v4.4.1 css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css" />
    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome-min.css" />
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href="assets/css/off-canvas.css" />
    <!-- flaticon css  -->
    <link rel="stylesheet" type="text/css" href="assets/css/ico-moon-fonts.css" />
    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="assets/css/swiper.css" />
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href="assets/css/sc-spacing.css" />
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />

    <style>
        .logo img {
            width: 65px;
            border-radius: 8px;
        }

        .footer_logo img {
            width: 60px;
            border-radius: 7px;
        }
    </style>
</head>

<body>
    <!--Preloader area start here-->
    <section class="loader_first">
        <div class="loader_first_inner">
            <div class="circular-spinner"></div>
        </div>
    </section>
    <!--Preloader area End here-->

    <!--Header Start-->
    <div class="bithu_header" id="navbar">
        <div class="container">
            <!-- Main Menu Start -->
            <div class="bithu_menu_sect">
                <div class="bithu_menu_left_sect">
                    <div class="logo">
                        <a href="index.php"><img src="assets/images/NYB-Coin.jpg" alt="logo" /></a>
                    </div>
                </div>
                <div class="bithu_menu_right_sect bithu_v1_menu_right_sect justify-content-end">
                    <div class="bithu_menu_list">
                        <ul>
                            <!--<li><a href="#">Create NFT</a></li>-->
                            <li><a href="./about-us.php">About</a></li>
                            <li><a href="./explore.php">Expore</a></li>
                            <!-- <li><a href="#">Recstarverse</a></li> -->
                            <li><a href="./profile.php">Profile</a></li>
                        </ul>
                    </div>
                    <div class="bithu_menu_right_buttonss">
                        <!-- <button class="join_btn hov_shape_show">
                                <img src="assets/images/icon/dis_logo.svg" alt="" />Join
                                <span class="hov_shape1"><img src="assets/images/icon/hov_shape_s.svg" alt="" /></span>
                                <span class="hov_shape2"><img src="assets/images/icon/hov_shape_s.svg" alt="" /></span>
                                <span class="square_hov_shape"></span>
                            </button> -->
                        <button class="menu_bar"><i class="fa-solid fa-bars"></i></button>
                        <div class="connect-btn connectedAccount">
                            <button class="connect_btn hov_shape_show" data-bs-toggle="modal"
                                data-bs-target="#connectModal">
                                <img src="assets/images/icon/connect_wallet.svg" alt="" />CONNECT
                                <span class="hov_shape1"><img src="assets/images/icon/hov_shape_s.svg" alt="" /></span>
                                <span class="hov_shape2"><img src="assets/images/icon/hov_shape_s.svg" alt="" /></span>
                                <span class="square_hov_shape"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Menu END -->

            <!-- Mobile Menu Start -->
            <div class="bithu_mobile_menu" id="bithu_mobile_menu">
                <div class="bithu_mobile_menu_content">
                    <div class="mobile_menu_logo">
                        <span><img src="assets/images/NYB-Coin.jpg" alt="" /></span>
                        <button class="mobile_menu_close_btn"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="bithu_mobile_menu_list">
                        <ul>
                            <!--<li class="mobile-menu-hide"><a href="#">Create NFT</a></li>-->
                            <li class="mobile-menu-hide"><a href="./about-us.php">About</a></li>
                            <li class="mobile-menu-hide"><a href="./explore.php">Expore</a></li>
                            <!-- <li class="mobile-menu-hide"><a href="#">Recstarverse</a></li> -->
                            <li class="mobile-menu-hide"><a href="./profile.php">Profile</a></li>
                        </ul>
                    </div>
                    <div class="mobile_menu_btns">
                        <ul class="mobile_menu_social_links">
                            <li>
                                <a href="#"><img src="assets/images/icon/opensea.svg" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-discord"></i></a>
                            </li>
                        </ul>
                        <div class="connect-btn connectedAccount w-100">
                            <button class="connect_btn hov_shape_show mobile-menu-hide" data-bs-toggle="modal"
                                data-bs-target="#connectModal">
                                <img src="assets/images/icon/connect_wallet.svg" alt="" />Connect
                                <span class="hov_shape1"><img src="assets/images/icon/hov_shape_s.svg" alt="" /></span>
                                <span class="hov_shape2"><img src="assets/images/icon/hov_shape_s.svg" alt="" /></span>
                                <span class="square_hov_shape"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu End -->
        </div>
    </div>
    <?php include 'connect.php' ?>