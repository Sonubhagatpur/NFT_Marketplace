 <?php include "header.php";
 
 $data = mysqli_query($link, "SELECT COUNT(Id) as nftuser FROM `nft_user`");
$resultUsers = $data->fetch_assoc();

$blockUsers = mysqli_num_rows(mysqli_query($link, "SELECT (Id) as blockeduser FROM `nft_user` WHERE `block`=1; "));

$data1 = mysqli_query($link, "SELECT COUNT(`ID`) as activenfts FROM `NFT_info` where NFT_resell='1'"); 
$activeNfts = $data1->fetch_assoc();
$listNfts = mysqli_num_rows(mysqli_query($link, "SELECT (`id`) as forSale FROM `NFT_info` WHERE `Mintstatus`=1 AND `block`=0 AND `approved`=1 AND `NFT_resell`=1;"));

$data2 = mysqli_query($link, "SELECT COUNT(`ID`) as totalnfts FROM `NFT_info` WHERE `Mintstatus`=1; ");
$totalNfts = $data2->fetch_assoc();


$totalCategory = mysqli_num_rows(mysqli_query($link, "SELECT (id) as nft_category FROM `nft_category` WHERE 1;"));
$totalCollections = mysqli_num_rows(mysqli_query($link, "SELECT (id) as collection FROM `nft_collections` WHERE 1;"));
 
 ?>
 
 <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                        <div class="col-xxl-12 col-12">
                            <div class="crancy-body">
                                <!-- Dashboard Inner -->
                                <div class="crancy-dsinner"> 
                                    <div class="row mt-4">
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="stat-widget d-flex align-items-center">
                                                <div class="widget-icon me-3" style="background-color: #1d7874 !important;"><span><i class="fa fa-users"></i></span></div>
                                                <div class="widget-content">
                                                    <h3><?php echo $resultUsers['nftuser']; ?></h3>
                                                    <p>Total Users</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="col-xl-4 col-sm-6">
                                            <div class="stat-widget d-flex align-items-center">
                                                <div class="widget-icon me-3" style="background-color: #20639b !important;"><span><i class="fa-solid fa-clipboard-list"></i></span></div>
                                                <div class="widget-content">
                                                    <h3><?php echo $totalNfts['totalnfts']; ?></h3>
                                                    <p>Total NFTs</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="col-xl-4 col-sm-6">
                                            <div class="stat-widget d-flex align-items-center">
                                                <div class="widget-icon me-3 bg-primary"><span><i class="fa-solid fa-dolly"></i></span></div>
                                                <div class="widget-content">
                                                    <h3><?php echo $listNfts; ?></h3>
                                                    <p>Total List for Sale</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="col-xl-4 col-sm-6">
                                            <div class="stat-widget d-flex align-items-center">
                                                <div class="widget-icon me-3 bg-warning"><span><i class="fa-brands fa-sellsy"></i></span></div>
                                                <div class="widget-content">
                                                    <h3><?php echo $totalCategory; ?></h3>
                                                    <p>Total Category</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="col-xl-4 col-sm-6">
                                            <div class="stat-widget d-flex align-items-center">
                                                <div class="widget-icon me-3" style="background-color: #ff7800 !important;"><span><i class="fa fa-hand-holding-usd"></i></span></div>
                                                <div class="widget-content">
                                                    <h3><?php echo $totalCollections; ?></h3>
                                                    <p>Total Collections</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="stat-widget d-flex align-items-center">
                                                <div class="widget-icon me-3 bg-danger"><span><i class="fa fa-users"></i></span></div>
                                                <div class="widget-content">
                                                    <h3><?php echo $blockUsers; ?></h3>
                                                    <p>Inactive Users</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- End Dashboard Inner -->
                            </div>
                        </div>
                    </div>
                   
                </div>
            </section>
            <!-- End crancy Dashboard -->
        </div>
        
        
        <style>
            .stat-widget {
  background: #fff;
  padding: 20px;
  border-radius: 16px;
  margin-bottom: 30px;
  position: relative;
  -webkit-box-shadow: 0 0 20px rgba(89, 102, 122, 0.05);
  box-shadow: 0 0 20px rgba(89, 102, 122, 0.05);
}

.stat-widget .widget-icon {
  width: 50px;
  height: 50px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  border-radius: 100%;
  font-size: 20px;
  color: #fff;
}

.stat-widget .widget-content p {
  color: #7e7e7e;
  opacity: 0.85;
  font-size: 14px;
  font-weight: 400;
  margin-bottom: 0px;
}

.stat-widget .widget-content h3, .stat-widget .widget-content .h3 {
  font-size: 20px;
  margin-bottom: 0px;
}

.bg-danger {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-danger-rgb), var(--bs-bg-opacity)) !important;
}

.bg-warning {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-warning-rgb), var(--bs-bg-opacity)) !important;
}

.bg-success {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-success-rgb), var(--bs-bg-opacity)) !important;
}

.bg-primary {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) !important;
}
        </style>
        
        
        
<?php include "footer.php";?>        