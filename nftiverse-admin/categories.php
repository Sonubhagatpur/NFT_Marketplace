 <?php include "header.php";
 
if(isset($_POST['delete'])){
     $id = $_POST['delete'];
     $delete = mysqli_query($link, "DELETE FROM `nft_category` WHERE `id`='$id'");
     if($delete){
         echo "<script>Swal.fire('Success','Category has been successfully deleted.','success')</script>";
     }else{
          echo "<script>Swal.fire('error','Internal server error.','error')</script>";
     }
     
 }
 
 ?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-layer-group"></i> NFT Category List </h4>
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
                                  <th scope="col">Name</th>
                                   <th scope="col"> Status</th>
                                   <th scope="col"> Action</th>
                                   
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1;
                                $category = mysqli_query($link, "SELECT * FROM `nft_category` ORDER BY id DESC");
                                foreach($category as $categorys){
                                    $isStatus = $categorys['status']==0 ? "Active" : "Deactive";
                                    $status = $categorys['status']==0 ? "success" : "danger";
                                    echo '<tr>
                                              <td>'.$i++.'</td>
                                              <td><img src="../'.$categorys['category_image'].'" width="30"> </td>
                                              <td>'.$categorys['category_name'].'</td>
                                              <td> <span class="badge bg-'.$status.'">'.$isStatus.'</span> </td>
                                               <td class="d-flex"> 
                                                    <a href="categories-edit.php?id='.$categorys['id'].'" ><i class="fa-solid fa-pen-to-square" style="background: #12a812;color: white;padding: 5px;margin-right: 5px;"></i> </a> 
                                                    <form method="post"><button name="delete" value="'.$categorys['id'].'" type="submit" style="height: auto;"> 
                                                    <i class="fa-solid fa-trash" style="background: red;color: white;padding: 5px;"></i></button></form>
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