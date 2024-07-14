 <?php include "header.php";?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-coins"></i> Biding deposit</h4>
                             
                             <p class="mt-2">Customers withdraw request list</p>
                         </div> 
                      </div>  
                    </div>
                    
                     <div class="row mt-4">
                        <div class="col-md-12">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">To Wallet</th>
                                  <th scope="col">Amount</th>
                                  <th scope="col"> Status </th>
                                   <th scope="col"> Action </th>
                                   
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>gystf7gs</td>
                                  <td>45.78</td>
                                  <td> <span class="badge bg-success">Success</span> </td>
                                  <td class="d-flex"> 
                                        <a href="Finance-details.php" ><i class="fa-solid fa-pen-to-square" style="background: #12a812;color: white;padding: 5px;margin-right: 5px;"></i> </a> 
                                        <a type="submit"> <i class="fa-solid fa-trash" style="background: red;color: white;padding: 5px;"></i></a> 
                                 </td>
                                </tr>
                                
                                <tr>
                                  <td>1</td>
                                  <td>gystf7gs</td>
                                  <td>45.78</td>
                                  <td> <span class="badge bg-warning">Pending</span> </td>
                                  <td class="d-flex"> 
                                        <a href="Finance-details.php">
                                            <i class="fa-solid fa-pen-to-square" style="background: #12a812;color: white;padding: 5px;margin-right: 5px;"></i> 
                                        </a> 
                                        <a type="submit"> <i class="fa-solid fa-trash" style="background: red;color: white;padding: 5px;"></i></a> 
                                 </td>
                                </tr>
                                
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
           </section> 
           
           
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>           