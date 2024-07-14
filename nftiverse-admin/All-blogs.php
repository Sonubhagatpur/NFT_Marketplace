 <?php include "header.php";
 
 
 if(isset($_POST['delete'])){
     $id = $_POST['delete'];
     $delete = mysqli_query($link, "DELETE FROM `blogs` WHERE `id`='$id'");
     if($delete){
         echo "<script>Swal.fire('Success','Blog has been successfully deleted.','success')</script>";
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
                             <h4> <i class="fa-solid fa-users"></i> All Blogs </h4>
                         </div> 
                      </div>  
                    </div>
                    
                     <div class="row crancy-gap-30">
                            <div class="col-12">
                                 <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Short Description</th>
                                   <th scope="col"> Action </th>
                                   
                                </tr>
                              </thead>
                              <tbody>
                                  <?php $i = 1;
                                  $blog = mysqli_query($link, "SELECT * FROM `blogs` ORDER BY `id` DESC");
                                  foreach($blog as $blogs){
                                      echo '<tr>
                                              <td>'.$i++.'</td>
                                              <td>'.$blogs['title'].'</td>
                                              <td>'.substr($blogs['short_description'],0, 30).'....</td>
                                              <td class="d-flex"> 
                                                    <a href="blogs-edit.php?id='.$blogs['id'].'" ><i class="fa-solid fa-pen-to-square" style="background: #12a812;color: white;padding: 5px;margin-right: 5px;"></i> </a> 
                                                    <form method="post">
                                                    <button name="delete" value="'.$blogs['id'].'" type="submit" style="height: auto;"> 
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
           </section> 
          
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>           