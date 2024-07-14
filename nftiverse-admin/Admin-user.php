 <?php include "header.php";?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-user-secret"></i> Admin List </h4>
                         </div> 
                      </div>  
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Full Name</th>
                                  <th scope="col">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $admin = mysqli_query($link, "SELECT * FROM `admins` ORDER BY `id` ASC");
                                  foreach($admin as $admins){
                                      $status = $admins['verify']==1 ? "Active" : "Inactive";
                                      $isstatus = $admins['verify']==1 ? "success" : "danger";
                                      echo '<tr>
                                              <td>1</td>
                                              <td> <img src="../'.$admins['images'].'" width="30" height="30"> </td>
                                              <td>'.$admins['name'].'</td>
                                              <td> <span class="badge bg-'.$isstatus.'">'.$status.'</span> </td>
                                            </tr>';
                                  }
                                  
                                  ?>
                                
                                
                                <!-- <tr>-->
                                <!--  <td>2</td>-->
                                <!--  <td> <img src="img/favicon.png" width="30" height="30"> </td>-->
                                <!--  <td>Manu</td>-->
                                <!--  <td>11:20:23</td>-->
                                <!--  <td> <span class="badge bg-danger">Inactive</span> </td>-->
                                <!--</tr>-->
                               
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
           </section>    
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>           