 <?php include "header.php";?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-users"></i> Customer List</h4>
                         </div> 
                      </div>  
                    </div>
                    
                     <div class="row mt-4">
                        <div class="col-md-12">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Full Name</th>
                                  <th scope="col">Email Address</th>
                                  <th scope="col">Wallet Address</th>
                                  <th scope="col"> Status </th>
                                   <th scope="col"> Action </th>
                                   
                                </tr>
                              </thead>
                              <tbody>
                                  <?php $i=1;
                                  
                                  $user = mysqli_query($link, "SELECT * FROM `nft_user` ORDER BY `Id` DESC");
                                  foreach($user as $users){
                                      $blockStatus = $users['block']==0 ? "success" : "danger";
                                      $block = $users['block']==0 ? "Active" : "Blocked";
                                      
                                      
                                      echo '<tr>
                                              <td>'.$i++.'</td>
                                              <td>'.$users['Username'].'</td>
                                              <td>'.$users['Useremail'].'</td>
                                              <td>'.$users['Useraddress'].'</td>
                                              <td> <span class="badge bg-'.$blockStatus.'">'.$block.'</span> </td>
                                              <td class="d-flex"> ';
                                              if ($users['block'] == 0) {
                                                    echo '<a onclick="userBlockUnblock(1,\'' . $users['Useraddress'] . '\')" type="submit"> <i class="fa-solid fa-ban"></i></a>';
                                                } else {
                                                    echo '<a onclick="userBlockUnblock(0,\'' . $users['Useraddress'] . '\')" type="submit"> <i class="fa-solid fa-unlock"></i></a>';
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
           </section> 
            <script type="module">
            import { userBlockUnblock } from './integration.js?v=<?php echo time() ?>';
            window.userBlockUnblock = userBlockUnblock;
        </script>
           
           
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>           