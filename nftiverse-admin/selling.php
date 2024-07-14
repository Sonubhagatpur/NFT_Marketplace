 <?php include "header.php";?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-cart-shopping"></i> Selling Setting </h4>
                         </div> 
                      </div>  
                    </div>
                     <div class="row mt-4">
                         <div class="col-md-12">
                             <div class="card px-3 pt-3">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="text-right">BID </td>
                                                <td>
                                                     <select>
                                                        <option value="0" null=""> Deactive</option>
                                                        <option value="1" selected="">Active</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>2</td>
                                                <td class="text-right">FIX </td>
                                                <td>
                                                   <select>
                                                        <option value="0" selected=""> Deactive</option>
                                                        <option value="1">Active</option>
                                                    </select>
                                                </td>
                                            </tr>
                                                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                     </div>
                    
                </div>
           </section> 
           
           <style>
               select{width:auto !important;}
           </style>
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>           