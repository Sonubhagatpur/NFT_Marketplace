<!DOCTYPE html>
<?php include 'config.php'; ?>
<html lang="zxx"><head>
    <title>Nftiverse</title>
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Nftiverse - NFT Marketplace" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <!-- CSS Files
    ================================================== -->
    <link id="bootstrap" href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/plugins.css" rel="stylesheet" type="text/css">    
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="css/scheme-12.css" rel="stylesheet" type="text/css">
    <link href="css/de-modern.css" rel="stylesheet" type="text/css">
    <link href="css/coloring-gradient.css" rel="stylesheet" type="text/css">
    <!-- custom font -->
    <link href="css/custom-font-3.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="img/faviconnft.png" type="image/x-icon" />
</head>

<body class="switch-scheme">
    <div id="wrapper">
        <!-- header begin -->
        <header class="transparent header-light scroll-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <div class="de-flex-col">
                                    <!-- logo begin -->
                                    <div id="logo">
                                        <a href="./">
                                            <img alt="" class="logo" src="img/logo-nft-light.png" width="200">
                                            <img alt="" class="logo-2" src="img/logo-nft.png" width="200">
                                        </a>
                                    </div>
                                    <!-- logo close -->
                                </div>
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <!-- mainmenu begin -->
                                <ul id="mainmenu">
                                    <li>
                                        <a href="./">Home<span></span></a>
                                       
                                    </li>
                                    <li>
                                        <a href="explore.php">Explore<span></span></a>
                                    </li>
                                    <li>
                                        <a href="#">Create<span></span></a>
                                        <ul>
                                            <li><a href="create-nft.php">NFT Create</a></li>
                                            <li><a href="create-collection.php">Collection Create</a></li>
                                        </ul>
                                    </li>                                    
                                   
                                </ul>
                                <div class="menu_side_area">
                                    <div class="de-login-menu">
                                        <!--<a href="#" class="btn-main"><i class="fa fa-plus"></i><span>Wallet Connect</span></a>-->
                                        <w3m-core-button></w3m-core-button>

                                    
                                        <span id="de-click-menu-profile" class="de-menu-profile">                           
                                            <img class="img-fluid Userimage" alt="">
                                        </span>


                                        <div id="de-submenu-profile" class="de-submenu">
                                            <div class="d-name">
                                                <h4 class="userName"></h4>
                                            </div>
                                            <div class="spacer-10"></div>
                                            <!--<div class="d-balance">-->
                                            <!--    <h4>Balance</h4>-->
                                            <!--    12.858 ETH-->
                                            <!--</div>-->
                                            <!--<div class="spacer-10"></div>-->
                                            <!--<div class="d-wallet">-->
                                            <!--    <h4>My Wallet</h4>-->
                                            <!--    <span id="wallet" class="d-wallet-address">DdzFFzCqrhshMSxb9oW3mRo4MJrQkusV3fGFSTwaiu4wPBqMryA9DYVJCkW9n7twCffG5f5wX2sSkoDXGiZB1HPa7K7f865Kk4LqnrME</span>-->
                                            <!--    <button id="btn_copy" title="Copy Text">Copy</button>-->
                                            <!--</div>-->

                                            <div class="d-line"></div>

                                            <ul class="de-submenu-profile">
                                                <li><a href="profile.php"><i class="fa fa-user"></i> My profile</a></li>
                                                <li><a href="Setting.php"><i class="fa fa-pencil"></i> Setting</a> </li>
                                                <!--<li><a href="#"><i class="fa fa-sign-out"></i> Sign out</a>-->
                                            </li></ul>
                                        </div>

                                        <span href="#" id="switch_scheme">
                                            <i class="ss_dark fa fa-moon-o"></i>
                                            <i class="ss_light fa fa-sun-o"></i>
                                        </span>
                                        <span id="menu-btn"></span>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="loading" class="" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 2000;">
            <div class="" style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; height: 100vh; background-color: #0d0d0db3; backdrop-filter: blur(22px);">
                <h3 class="text-white">Transaction in process, Please wait and do not refresh the page.</h3>
                <img src="./img/transactionloder.gif" class="rounded-circle" width="200" height="200" />
            </div>
        </div>
        
        <?php $currency = "BCC"; ?>
        <!-- header close -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/4.0.1-alpha.1/web3.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <script src="./integration/contracts.js?v=<?php echo time() ?>"></script>
    <script src="./integration/NFT_like.js?v=<?php echo time() ?>"></script>
        <script>
        
           const web3 = new Web3();
        
            function getMe2DecimalPointsWithCommas(amount) {
                return Number(amount).toLocaleString(undefined, {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 2
                });
            }
             
            
            function toastMessage(status, title) {
                    Swal.fire({
                        toast: true,
                        icon: status,
                        title: title,
                        animation: false,
                        position: 'bottom-right',
                        showConfirmButton: false,
                        timer: 3000,
                        animation: true,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                }
            
        </script>
        
        
    <script type="module">
        import { like, likeNewItem, likeExplore } from "./integration/main.js?v=1<?php echo time() ?>";
        window.like = like
        window.likeNewItem = likeNewItem
        window.likeExplore = likeExplore
    </script>