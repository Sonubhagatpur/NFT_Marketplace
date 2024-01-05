<? session_start();
if(empty($_SESSION['email'])){
    header('Location: ./login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin </title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.3.6/web3.min.js" integrity="sha512-jMEcX0Bev3VsCrACqEM3BFZvAMFXJSuTsMu0SttkAdMjquip6p3Oty5bbXrfg4T8n4g5BQYkGKxzLsrSqQgLUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<? include("../config.php");
if(isset($_POST['news_save'])){
    $path = '../uploads/';
    $name = $_FILES['news_img']['name'];
    $tmp_name =  $_FILES['news_img']['tmp_name'];
    $new_name = time()."_".rand(1000, 9999)."-".$name;
        if (move_uploaded_file($tmp_name, $path."/".$new_name)){
            $sql="INSERT INTO `nft_news`( `news_title`, `news_image`, `news_description`) VALUES ('".$_POST['news_title']."','uploads/".$new_name."','".$_POST['news_text']."')"; 
            $data = mysqli_query($link,$sql);
            if($data){
                echo "<script>swal('success','News sucessfully!','success');</script>";
            }else{
                echo "<script>swal('warning','something went wrong!','warning');</script>";
            }
        }
}
if(isset($_POST['nft_status_b'])){
    mysqli_query($link, "UPDATE `nft_news` SET `status`=1 WHERE `id`=".$_POST['nft_status_b']);
    echo "<script>alert('News unactive Successfully');</script>";
}
if(isset($_POST['nft_status_unb'])){
    mysqli_query($link, "UPDATE `nft_news` SET `status`=0 WHERE `id`=".$_POST['nft_status_unb']);
    echo "<script>alert('News Active Successfully');</script>";
}
if(isset($_POST['nft_delete'])){
    mysqli_query($link, "DELETE FROM `nft_news` WHERE `id`=".$_POST['nft_delete']);
    echo "<script>alert('News Deleted Successfully');</script>";
}       
?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <?php include("sidebar.php"); ?>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!--<a class="dropdown-item" href="#">-->
                                <!--    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>-->
                                <!--    Profile-->
                                <!--</a>-->
                                <!--<a class="dropdown-item" href="#">-->
                                <!--    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
                                <!--    Settings-->
                                <!--</a>-->
                                <!--<a class="dropdown-item" href="#">-->
                                <!--    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>-->
                                <!--    Activity Log-->
                                <!--</a>-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
    <section class="admin-page my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class=" mb-3 mt-5">Blog Details</h4>
                </div>
                <div class="col-md-12">
                    <div class="nft-admin">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="POST"  enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label>News Title</label>
                                    <input type="text" class="form-control" id="" name="news_title" aria-describedby="emailHelp" placeholder="Enter News Title">
                                  </div>
                                  <div class="form-group">
                                      <label>News Title</label>
                                    <input type="file" class="form-control" id="" name="news_img" aria-describedby="emailHelp" placeholder="">
                                  </div>
                                  <div class="form-group">
                                      <label>News Description</label>
                                    <textarea class="form-control" id="news_text" name="news_text" aria-describedby="emailHelp" placeholder="Enter News description"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <input type="submit" class="fbtn btn-success" name="news_save" vaue="save">
                                  </div>
                                </form>
                            </div>
                            <hr>
                            
                            <div class="card-body">
                                <h4>Blog list</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">News Title</th>
											<th scope="col">Edit Blog</th>
                                            <th Scope="col">Active/Unactive</th>
                                            <th Scope="col">Delete</th>
                                            
                                        </tr>
                                    </thead>
                                     <tbody>
                                        <?
                                        $nft_data=mysqli_query($link, "SELECT * FROM `nft_news` order by time desc");
                                        foreach($nft_data as $nft_dat){
                                            echo '<tr scope="col">
                                                    <td>'.$nft_dat['news_title'].'</td>
													<td><a href="./nft_edit.php?id='.$nft_dat['id'].'">Edit</a></td>';
                                                    if($nft_dat['status']==0){
                                                        echo '<form method="post"><td><button type="submit" class="btn btn-success" name="nft_status_b" value='.$nft_dat['id'].'>Block</button></td></form>';
                                                    }else{
                                                        echo '<form method="post"><td><button type="submit" class="btn btn-warning" name="nft_status_unb" value='.$nft_dat['id'].'>Un-Block</button></td></form>';
                                                    }
                                                    echo '<form method="post"><td><button type="submit" class="btn btn-danger" name="nft_delete" value='.$nft_dat['id'].'>Delete</button></td></form>
                                                 </tr>';
                                            } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>
              
               
            </div>
        </div>
      
    </section>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
      <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script>CKEDITOR.replace( 'news_text' );</script>
</body>

</html>