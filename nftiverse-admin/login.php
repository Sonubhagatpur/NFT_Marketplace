
<?php session_start();
if (isset($_SESSION['nftiverse_email']) && !empty($_SESSION['nftiverse_email'])) {
    echo "<script>location.href='./index.php'</script>";
}
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
        <title>Login</title>

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
        <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body id="crancy-dark-light">
             
     <style>
         .crancy-wc__form-inside {
  display: flex;
  justify-content: center;
  align-items: center;
  max-width: 370px;
  margin: auto;
  border: 2px solid #20b2ff;
  padding: 50px 21px;
  border-radius: 20px;
}
     </style>
     
        <?php include "../config.php";
        
if(isset($_POST['adminLogin'])){
    $useremail = $_POST["email"];
    $password = $_POST['password'];

    if($useremail != "" && $password != ""){
        // Sanitize email (optional but recommended)
        $useremail = filter_var($useremail, FILTER_SANITIZE_EMAIL);

        // Query database
        $sql = mysqli_query($link,"SELECT * FROM `admins` WHERE `email` = '$useremail'");
        
        if($sql){
            $count = mysqli_num_rows($sql);
            
            if($count > 0){
                $user_pass = mysqli_fetch_assoc($sql);
                
                // Verify password using password_verify()
                if(password_verify($password, $user_pass['password'])){
                    $_SESSION['nftiverse_email'] = $user_pass['email'];

                    if($user_pass['verify'] == 1){
                        echo "<script>window.location='./index.php';</script>";
                        //header("Location: ./index.php");
                        exit();
                    } else {
                        echo "<script>Swal.fire('warning','You are not authorized to access this site.','warning');</script>";
                    }
                } else {
                    echo "<script>Swal.fire('warning','Incorrect username or password.','warning');</script>";
                }
            } else {
                echo "<script>Swal.fire('warning','Incorrect username or password.','warning');</script>";
            }
        } else {
            echo "<script>Swal.fire('error','Database query failed.','error');</script>";
        }
    } else {
        echo "<script>Swal.fire('warning','Please fill in both email and password fields.','warning');</script>";
    }
}
            
            ?>
        
        
        
        <div class="body-bg">
            <section class="crancy-wc crancy-wc__full crancy-bg-cover">
                <div class="crancy-wc__form">
                    <!-- Welcome Banner -->
                    <div class="crancy-wc__form--middle">
                        <div class="crancy-wc__form-inner" style="width: 100%;">
                            <div class="crancy-wc__logo text-center">
                                <a href="index.html"><img src="img/quantum.png" alt="#" /></a>
                            </div>
                            <div class="crancy-wc__form-inside">
                                <div class="crancy-wc__form-middle">
                                    <div class="crancy-wc__form-top">
                                        <div class="crancy-wc__heading pd-btm-20">
                                            <h3 class="crancy-wc__form-title crancy-wc__form-title__one m-0">
                                                Login to your account
                                            </h3>
                                        </div>
                                        <!-- Sign in Form -->
                                        <form class="crancy-wc__form-main" action="#" method="post">
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <div class="form-group__input">
                                                    <input class="crancy-wc__form-input" type="email" name="email" placeholder="Email" required="required" />
                                                </div>
                                            </div>
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <div class="form-group__input">
                                                    <input class="crancy-wc__form-input" placeholder="Password" id="password-field" type="password" name="password" minlength="8" required="required" />
                                                    <span class="crancy-wc__toggle"><i class="fas fa-eye" id="toggle-icon"></i></span>
                                                </div>
                                            </div>
                                            <!-- Form Group -->
                                            <div class="crancy-wc__button crancy-wc__button--initial mt-3">
                                                <button name="adminLogin" class="ntfmax-wc__btn ntfmax-wc__btn--login" type="submit">
                                                    Continue<span><i class="fa-solid fa-arrow-right"></i></span>
                                                </button>
                                            </div>
                                           
                                        </form>
                                        <!-- End Sign in Form -->
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <!-- End Welcome Banner -->
                </div>
            </section>
        </div>

        <!--  Scripts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/charts.js"></script>
        <script src="js/final-countdown.min.js"></script>
        <script src="js/fancy-box.min.js"></script>
        <!-- <script src="js/datatables.min.js"></script> -->
        <script src="js/circle-progress.min.js"></script>
        <script src="js/nice-select.min.js"></script>
        <script src="js/pikaday.min.js"></script>
        <script src="js/main.js"></script>

        <script>
            var crancyWCSlider = jQuery(".crancy-wc__slider").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                fade: true,
                infinite: true,
                arrows: false,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true,
            });
        </script>
    </body>
</html>
