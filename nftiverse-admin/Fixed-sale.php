 <?php include "header.php";?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <img src="img/nfts.png" width="28">Fixed sale listed NFTs</h4>
                         </div> 
                      </div>  
                    </div>
                    
                     <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">NFT Name</th>
                                  <th scope="col">Token ID</th>
                                  <th scope="col">Category Name</th>
                                  <th scope="col"> Collection Title </th>
                                   <th scope="col"> Blockchain Network </th>
                                   <th scope="col"> Owner</th>
                                   <th scope="col"> Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                <?php  $i = 1;
                            
                                 $uerry = mysqli_query($link, "SELECT * FROM `NFT_info` WHERE `Mintstatus`=1 AND `NFT_type`=2 ORDER BY id DESC");
                                
                                foreach($uerry as $rows){
                                    $collName = $rows['NFT_collection'];
                                    $owner = $rows['NFT_owner_address'];
                                    $isblock = $rows['block']==1 ? "Unverify" : "Verified";
                                    $isStatus = $rows['block']==1 ? "danger" : "success";
                                    $collection = mysqli_fetch_assoc(mysqli_query($link, "SELECT `collection_image`, `Address`, `collection_name`, `collection_logo`, `collection_description`, `title`, `blockchain_network` FROM `nft_collections` WHERE `collection_name`='$collName'"));
                                    
                                    echo '<tr>
                                              <td>'.$i++.'</td>
                                              <td>'.$rows['NFT_name'].'</td>
                                              <td>'.$rows['NFT_id'].'</td>
                                              <td>'.$rows['NFT_category'].'</td>
                                              <td>'.$collection['title'].'</td>
                                              <td>BLockchain</td>
                                              <td>'.$owner.'</td>
                                              <td> <span class="badge bg-'.$isStatus.'">'.$isblock.'</span> </td>
                                              
                                            </tr>';
                                
                                }
                                ?>
                                
                                
                              </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
           </section> 
           
           
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>           