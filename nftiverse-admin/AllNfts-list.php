 <?php include "header.php";?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <img src="img/nfts.png" width="28"> All NFTs List</h4>
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
                                   <th scope="col"> Action</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php  $i = 1;
                            
                            $uerry = mysqli_query($link, "SELECT * FROM `NFT_info` WHERE `Mintstatus`=1 AND `approved`=1  ORDER BY id DESC");
                                
                                foreach($uerry as $rows){
                                    $collName = $rows['NFT_collection'];
                                    $owner = $rows['NFT_owner_address'];
                                    $isblock = $rows['block']==1 ? "Blocked" : "Active";
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
                                              <td class="d-flex"> ';
                                              if ($rows['block'] == 0) {
                                                    echo '<a onclick="NFTBlockUnblock(1,\'' . $rows['NFT_id'] . '\')" type="submit"> <i class="fa-solid fa-ban"></i></a>';
                                                } else {
                                                    echo '<a onclick="NFTBlockUnblock(0,\'' . $rows['NFT_id'] . '\')" type="submit"> <i class="fa-solid fa-unlock"></i></a>';
                                                }

                                                   echo '
                                             </td>
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
           
           <script type="module">
            import { NFTBlockUnblock } from './integration.js?v=<?php echo time() ?>';
            window.NFTBlockUnblock = NFTBlockUnblock;
        </script>
           
           
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>           