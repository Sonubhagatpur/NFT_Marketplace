 <?php include "header.php";
 
  if (isset($_POST['block_collection'])) {
    mysqli_query($link, "UPDATE `nft_collections` SET `collection_status`=1 WHERE `id`=" . $_POST['block_collection']);
    echo "<script>Swal.fire('Success','Collection unactive Successfully', 'success');</script>";
}
if (isset($_POST['unblock_collection'])) {
    mysqli_query($link, "UPDATE `nft_collections` SET `collection_status`=0 WHERE `id`=" . $_POST['unblock_collection']);
    echo "<script>Swal.fire('Success','Collection Active Successfully', 'success');</script>";
}


 ?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-layer-group"></i> Collections </h4>
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
                                  <th scope="col">Icon</th>
                                  <th scope="col">Collections Name</th>
                                   <th scope="col"> Status</th>
                                   <th scope="col"> Action</th>
                                   
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1;
                                $category = mysqli_query($link, "SELECT * FROM `nft_collections` ORDER BY id DESC");
                                foreach($category as $categorys){
                                    $isStatus = $categorys['status']==0 ? "Active" : "Deactive";
                                    $status = $categorys['status']==0 ? "success" : "danger"; 
                                    echo '<tr>
                                              <td>'.$i++.'</td>
                                              <td><img src="../'.$categorys['collection_image'].'" width="30"> </td>
                                              <td>'.$categorys['collection_name'].'</td>
                                              <td> <span class="badge bg-'.$status.'">'.$isStatus.'</span> </td>
                                               <td class="d-flex"> 
                                                    <a href="Collections-edit.php?id='.$categorys['id'].'" ><i class="fa-solid fa-pen-to-square" style="background: #12a812;color: white;padding: 5px;margin-right: 5px;"></i> </a> 
                                                    <a name="block_collection" value="'.$categorys['id'].'" type="submit"> <i class="fa-solid fa-trash" style="background: red;color: white;padding: 5px;"></i></a> 
                                                    
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
           
           
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>           