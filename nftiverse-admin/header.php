<?php session_start();
include "../config.php";
if (!isset($_SESSION['nftiverse_email']) || empty($_SESSION['nftiverse_email'])) {
    echo "<script>location.href='./login.php'</script>";
}

$selectedEmail = $_SESSION['nftiverse_email'];
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="keywords" content="Site keywords here" />
        <meta name="description" content="#" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Site Title -->
        <title>Nftiverse Admin</title>

        <!-- Fav Icon -->
        <link rel="icon" href="img/favicon.png" />

        <!--  Stylesheet -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/slick.min.css" />
        <link rel="stylesheet" href="css/font-awesome-all.min.css" />
        <link rel="stylesheet" href="css/charts.min.css" />
        <link rel="stylesheet" href="css/datatables.min.css" />
        <link rel="stylesheet" href="css/fancy-box.min.css" />
        <link rel="stylesheet" href="css/nice-select.min.css" />
        <link rel="stylesheet" href="css/pikaday.min.css" />
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="style.css?v=1.1"/>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css" />
    </head>
    <body id="crancy-dark-light">
        <div class="crancy-body-area">
            <!-- crancy Admin Menu -->
            <div class="crancy-smenu" id="CrancyMenu">
                <!-- Admin Menu -->
                <div class="admin-menu">
                    <!-- Logo -->
                    <div class="logo crancy-sidebar-padding pd-right-0">
                        <a class="crancy-logo" href="index.php">
                            <!-- Logo for Default -->
                            <img class="crancy-logo__main" src="img/quantum.png" alt="#" style="width: 200px;" />
                            <!-- Logo for Dark Version -->
                            <img class="crancy-logo__main--small" src="img/favicon.png" alt="#" style="width: 40px;" />
                        </a>
                        <div id="crancy__sicon" class="crancy__sicon close-icon">
                            <img src="img/arrow-icon.svg" />
                        </div>
                    </div>

                    <!-- Main Menu -->
                    <div class="admin-menu__one crancy-sidebar-padding mg-top-20"> 
                        <!-- Nav Menu -->
                        <div class="menu-bar">
                            <ul id="CrancyMenu" class="menu-bar__one crancy-dashboard-menu">
                                <li>
                                    <a class="collapsed" href="index.php">
                                        <span class="menu-bar__text">
                                            <span class="crancy-menu-icon crancy-svg-icon__v1">
                                                <i class="fa-solid fa-home"></i>
                                            </span>
                                            <span class="menu-bar__name">Dashboard </span>
                                        </span>
                                    </a>
                                </li> 
                                
                                <li> 
                                    <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__apps" aria-expanded="false">
                                        <span class="menu-bar__text">
                                            <span class="crancy-menu-icon crancy-svg-icon__v1">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                            <span class="menu-bar__name">Admin</span>
                                        </span>
                                        <span class="crancy__toggle"></span>
                                    </a>
                                    <!-- Dropdown Menu -->
                                    <div class="crancy__dropdown collapse" id="menu-item__apps" data-bs-parent="#CrancyMenu" style="">
                                        <ul class="menu-bar__one-dropdown">
                                            <li>
                                                <a href="Admin-user.php">
                                                    <span class="menu-bar__text"><span class="menu-bar__name">Admin Users</span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="Add-admin.php">
                                                    <span class="menu-bar__text"><span class="menu-bar__name">Add Admin Users</span></span>
                                                </a>
                                            </li> 
                                             <li>
                                                <a href="create-nft.php">
                                                    <span class="menu-bar__text"><span class="menu-bar__name">Create NFTs</span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="transfer-nfts.php">
                                                    <span class="menu-bar__text"><span class="menu-bar__name">NFTs Transfer</span></span>
                                                </a>
                                            </li> 
                                        </ul>
                                    </div>
                                </li>
                                
                                 <li>
                                    <a class="collapsed" href="customers.php">
                                        <span class="menu-bar__text">
                                            <span class="crancy-menu-icon crancy-svg-icon__v1">
                                                <i class="fa-solid fa-users"></i>
                                            </span>
                                            <span class="menu-bar__name">Customers </span>
                                        </span>
                                    </a>
                                </li> 
                                
                                
                                 
                                <li> 
                                    <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__apps2" aria-expanded="false">
                                        <span class="menu-bar__text">
                                            <span class="crancy-menu-icon crancy-svg-icon__v1">
                                                <i class="fa-solid fa-braille"></i>
                                            </span>
                                            <span class="menu-bar__name">NFTs</span>
                                        </span>
                                        <span class="crancy__toggle"></span>
                                    </a>
                                    <!-- Dropdown Menu -->
                                    <div class="crancy__dropdown collapse" id="menu-item__apps2" data-bs-parent="#CrancyMenu" style="">
                                        <ul class="menu-bar__one-dropdown" style="">
                                            <li>
                                                <a href="MintNFT-List.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                    Mint  NFT List </span> </span> </a>
                                            </li>
                                            
                                            <li>
                                                <a href="AllNfts-list.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                    All  NFT List </span> </span> </a>
                                            </li>
                                            
                                            <li>
                                                <a href="Auctioned.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                      Auctioned NFTs </span> </span> </a>
                                            </li>
                                            
                                            <li>
                                                <a href="Fixed-sale.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                      Fixed Sale NFTs  </span> </span> </a>
                                            </li>
                                            
                                            <li>
                                                <a href="Todays.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                      Today's Sale End  </span> </span> </a>
                                            </li>
                                            
                                             <li>
                                                <a href="categories.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                     Categories  </span> </span> </a>
                                            </li>
                                            
                                             <li>
                                                <a href="Category-add.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                      Add Category  </span> </span> </a>
                                            </li>
                                            
                                            <li>
                                                <a href="Collections.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                     Collections  </span> </span> </a>
                                            </li>
                                            
                                             <li>
                                                <a href="Collections-add.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                      Add Collection  </span> </span> </a>
                                            </li>                        
                                          </ul>
                                    </div>
                                </li>
                                
                                
                                <li>
                                    <a class="collapsed" href="Finance.php">
                                        <span class="menu-bar__text">
                                            <span class="crancy-menu-icon crancy-svg-icon__v1">
                                                <i class="fa-solid fa-coins"></i>
                                            </span>
                                            <span class="menu-bar__name">Finance </span>
                                        </span>
                                    </a>
                                </li> 
                                
                                
                                 <li>
                                    <a class="collapsed" href="report.php">
                                        <span class="menu-bar__text">
                                            <span class="crancy-menu-icon crancy-svg-icon__v1">
                                                <i class="fa-solid fa-file"></i>
                                            </span>
                                            <span class="menu-bar__name">Report </span>
                                        </span>
                                    </a>
                                </li> 
                                
                                 <li> 
                                    <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__apps4" aria-expanded="false">
                                        <span class="menu-bar__text">
                                            <span class="crancy-menu-icon crancy-svg-icon__v1">
                                                <i class="fa-solid fa-blog"></i>
                                            </span>
                                            <span class="menu-bar__name">Blogs</span>
                                        </span>
                                        <span class="crancy__toggle"></span>
                                    </a>
                                    <!-- Dropdown Menu -->
                                    <div class="crancy__dropdown collapse" id="menu-item__apps4" data-bs-parent="#CrancyMenu" style="">
                                        <ul class="menu-bar__one-dropdown" style="">
                                            <li>
                                                <a href="add-blogs.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                      Add Blogs </span> </span> </a>
                                            </li>
                                            
                                            <li>
                                                <a href="All-blogs.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                      All Blogs </span> </span> </a>
                                            </li>
                                                                
                                          </ul>
                                    </div>
                                </li>
                                

                                <li> 
                                    <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__apps3" aria-expanded="false">
                                        <span class="menu-bar__text">
                                            <span class="crancy-menu-icon crancy-svg-icon__v1">
                                                <i class="fa-solid fa-cog"></i>
                                            </span>
                                            <span class="menu-bar__name">Settings</span>
                                        </span>
                                        <span class="crancy__toggle"></span>
                                    </a>
                                    <!-- Dropdown Menu -->
                                    <div class="crancy__dropdown collapse" id="menu-item__apps3" data-bs-parent="#CrancyMenu" style="">
                                        <ul class="menu-bar__one-dropdown" style="">
                                            <li>
                                                <a href="Fees.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                      Fees setting </span> </span> </a>
                                            </li>
                                            
                                            <li>
                                                <a href="selling.php">  <span class="menu-bar__text"><span class="menu-bar__name">
                                                      Selling setting </span> </span> </a>
                                            </li>
                                                                
                                          </ul>
                                    </div>
                                </li>
                                
                                
                                
                                
                            </ul>
                        </div>
                        <!-- End Nav Menu -->
                    </div>

                    <div class="crancy-sidebar-padding pd-btm-40">
                        
                        <div class="menu-bar">
                            <ul class="menu-bar__one crancy-dashboard-menu" id="CrancyMenu">
                                 
                                <li>
                                    <a href="logout.php" class="collapsed">
                                        <span class="menu-bar__text">
                                            <span class="crancy-menu-icon crancy-svg-icon__v1">
                                                <svg class="crancy-svg-icon" xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18" fill="none">
                                                    <path d="M19 11L20.2929 9.70711C20.6834 9.31658 20.6834 8.68342 20.2929 8.29289L19 7" stroke="#191B23" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M20 9H12M5 17C2.79086 17 1 15.2091 1 13V5C1 2.79086 2.79086 1 5 1M5 17C7.20914 17 9 15.2091 9 13V5C9 2.79086 7.20914 1 5 1M5 17H13C15.2091 17 17 15.2091 17 13M5 1H13C15.2091 1 17 2.79086 17 5"
                                                        stroke="#191B23"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                    />
                                                </svg>
                                            </span>
                                            <span class="menu-bar__name">Logout</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Nav Menu -->
                        
                    </div>
                </div>
                <!-- End Admin Menu -->
            </div>
            <!-- End crancy Admin Menu -->

            <!-- Start Header -->
            <header class="crancy-header">
                <div class="container g-0">
                    <div class="row g-0">
                        <div class="col-12">
                            <!-- Dashboard Header -->
                            <div class="crancy-header__inner">
                                <div class="crancy-header__middle">
                                    <div id="crancy__sicon" class="crancy__sicon close-icon d-none">
                                        <img src="img/arrow-icon.svg" />
                                    </div>
                                    <div class="crancy-header__heading">
                                        <h3 class="crancy-header__title m-0">
                                            Dashboard - Nftiverse
                                        </h3>
                                    </div>

                                    <div class="crancy-header__left">
                                        <div class="crancy-header__nav-bottom">
                                            <!-- Logo -->
                                            <div class="logo crancy-sidebar-padding">
                                                <a class="crancy-logo" href="index.php">
                                                    <!-- Logo for Default -->
                                                    <img class="crancy-logo__main" src="img/logo-quantumedgemea.png" alt="#" />
                                                    <!-- Logo for Dark Version -->
                                                    <img class="crancy-logo__main--small" src="img/favicon.png" alt="#" />
                                                </a>
                                            </div>
                                        </div>
                                        <!--  End Logo -->
                                       
                                    </div>

                                    <div class="crancy-header__right">
                                        <w3m-core-button></w3m-core-button>
                                        <a href="#" class="crancy-btn crancy-ybcolor"><?php echo $selectedEmail ?></a>
                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="userName d-none"></div>
                <div class="Userimage d-none"></div>
            </header>
            <!-- End Header -->
            <div id="loading" class="" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 2000;">
            <div class="" style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; height: 100vh; background-color: #0d0d0db3; backdrop-filter: blur(22px);">
                <h3 class="text-white">Transaction in process, Please wait and do not refresh the page.</h3>
                <img src="../img/transactionloder.gif" class="rounded-circle" width="200" height="200" />
            </div>
        </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/4.0.1-alpha.1/web3.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../integration/contracts.js?v=<?php echo time() ?>"></script>
            <script type="module" src="../integration/main.js?v=<?php echo time() ?>"></script>
             <script>
                const web3 = new Web3();
    
                function user() {
                    // console.clear();
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