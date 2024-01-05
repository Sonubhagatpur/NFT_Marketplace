<? session_start();
if (empty($_SESSION['email'])) {
    header('Location: ../login.php');
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <? include("../config.php");
    if (isset($_POST['nft_up'])) {
        $id = $_POST['nft_up'];
        $pp = mysqli_query($link, "select NFT_id from NFT_info where nft_priority=" . $_POST['nft' . $id]);
        foreach ($pp as $p) {
            mysqli_query($link, "UPDATE `NFT_info` SET `nft_priority`=0 WHERE `NFT_id`=" . $p['NFT_id']);
        }
        mysqli_query($link, "UPDATE `NFT_info` SET `nft_priority`=" . $_POST['nft' . $id] . " WHERE `NFT_id`=" . $id);
        echo "<script>alert('NFT Data Update Successfully');</script>";
    }
    if (isset($_POST['nft_status_b'])) {
        mysqli_query($link, "UPDATE `NFT_info` SET `block`=1 WHERE `NFT_id`=" . $_POST['nft_status_b']);
        echo "<script>alert('NFT Blocked Successfully');</script>";
    }
    if (isset($_POST['nft_status_unb'])) {
        mysqli_query($link, "UPDATE `NFT_info` SET `block`=0 WHERE `NFT_id`=" . $_POST['nft_status_unb']);
        echo "<script>alert('NFT UnBlocked Successfully');</script>";
    }

    if (isset($_POST['nft_approve'])) {
        mysqli_query($link, "UPDATE `NFT_info` SET `status`=1 WHERE `NFT_id`=" . $_POST['nft_approve']);
        echo "<script>alert('NFT Approve Successfully');</script>";
    }
    if (isset($_POST['nft_unapprove'])) {
        mysqli_query($link, "UPDATE `NFT_info` SET `status`=2 WHERE `NFT_id`=" . $_POST['nft_unapprove']);
        echo "<script>alert('NFT Unapprove Successfully');</script>";
    }

    if (isset($_POST['nft_delete'])) {
        mysqli_query($link, "DELETE FROM `NFT_info` WHERE `NFT_id`=" . $_POST['nft_delete']);
        echo "<script>alert('NFT Deleted Successfully');</script>";
    }
    $nft_data = mysqli_query($link, "SELECT * FROM `NFT_info` order by id desc");
    ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['email'] ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">NFT List</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">NFT List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">NFT ID</th>
                                            <th scope="col">NFT Name</th>
                                            <th scope="col">Creator Address</th>
                                            <th scope="col">Owner Address</th>
                                            <th scrope="col">Date & Time</th>
                                            <th scope="col"> View Transaction</th>
                                            <th Scope="col">Block/UnBlock</th>
                                            <!--<th Scope="col">Approve</th>-->
                                            <th Scope="col">Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $i = 1;
                                        foreach ($nft_data as $nft_dat) {
                                            // $d=mysqli_query($link,"SELECT count(*) as total FROM `NFT_hash` where `NFT_id`=".$nft_dat['NFT_id']);
                                            // $tt=$d->fetch_assoc();
                                            $onwer = mysqli_query($link, "SELECT * FROM `nft_user` where Useraddress='" . $nft_dat['NFT_owner_address'] . "'");
                                            $onwer = $onwer->fetch_assoc();

                                            $creator = mysqli_query($link, "SELECT * FROM `nft_user` where Useraddress='" . $nft_dat['NFT_creator_add'] . "'");
                                            $creator = $creator->fetch_assoc();
                                            echo '<tr scope="col">
                        <td>' . $i++ . '</td>
                        <td>' . $nft_dat['NFT_id'] . '</td>
                        <td>' . $nft_dat['NFT_name'] . '</td>
                        <td>' . $creator['Useraddress'] . '</td>
                        <td>' . $onwer['Useraddress'] . '</td>
                        <td>' . $nft_dat['NFT_time'] . '</td>';
                                            if ($nft_dat['Multi_status'] == 0) {
                                                echo '<td><a target="_blank" href="https://bscscan.com/token/0x97b73a7Be57053dFf3C5dEd9a73903975eBd2E57?a=' . $nft_dat['NFT_id'] . '"><button type="submit" class="btn btn-info" name="" value=' . $nft_dat['NFT_id'] . '>view</button></a></td>';
                                            } else {
                                                echo '<td><a target="_blank" href="https://bscscan.com/token/0x97b73a7Be57053dFf3C5dEd9a73903975eBd2E57?a=' . $nft_dat['NFT_id'] . '"><button type="submit" class="btn btn-info" name="" value=' . $nft_dat['NFT_id'] . '>view</button></a></td>';
                                            }
                                            if ($nft_dat['block'] == 0) {
                                                echo '<form method="post"><td><button type="submit" class="btn btn-success" name="nft_status_b" value=' . $nft_dat['NFT_id'] . '>Block</button></td></form>';
                                            } else {
                                                echo '<form method="post"><td><button type="submit" class="btn btn-warning" name="nft_status_unb" value=' . $nft_dat['NFT_id'] . '>Un-Block</button></td></form>';
                                            }
                                            echo '<form method="post"><td><button type="submit" class="btn btn-danger" name="nft_delete" value=' . $nft_dat['NFT_id'] . '>Delete</button></td></form>
                     </tr>';
                                            $i++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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

</body>

</html>