<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</head>

<body class="bg-gradient-primary">
<? include("../config.php");
 if (isset($_POST['send_message'])) {
    $useremail = $_POST["email"];
    if(empty(trim($_POST["email"])) && empty(trim($_POST['password'])) && empty(trim($_POST['re_password']))){
       
        echo "<script>swal('warning','Please fill all fields.','warning')</script>";
    } else{
        $sql = $link->query("SELECT email FROM nft_users WHERE email = '$useremail'");
        if(!empty($sql->num_rows)){
            
            echo "<script>swal('warning','This email is already in use.','warning')</script>";
        }
    }
    if((trim($_POST["password"]))!=(trim($_POST['re_password']))){
        
        echo "<script>swal('warning','Please enter same password.','warning')</script>";
    } else{
        $password = trim($_POST["password"]);
    }
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    
    if(empty($error_message)){
        
        $sql = $link->query("SELECT email FROM nft_users WHERE email = '$useremail'");
        if(!empty($sql->num_rows)){
            
            echo "<script>swal('warning','This email is already in use.','warning')</script>";
        }else{
            $sql = "INSERT INTO nft_users (	email, 	password) VALUES ('$email', '$password')";
            
            $result = $link->query($sql);
            if ($result) {
            
              echo "<script>swal('success','New record created successfully. Please go to the login page.','success')</script>";
            } else {
          
              echo "<script>swal('warning','something went wrong.','warning')</script>";
            }
        }
        
    }
}?>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post">
                                <? if(!empty($error_message)){ echo $error_message;}?>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="re_password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" name="send_message" value="1" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>