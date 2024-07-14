 <?php include "header.php";
 
 
//  if ($_SERVER["REQUEST_METHOD"] == "GET") {

//  $sql = "SELECT n.*, u.Username 
//             FROM NFT_info AS n 
//             LEFT JOIN nft_user AS u 
//              ";

//     // Example input parameters (replace with actual values or user input)
//     $earning_type = $_GET['earning_type'] ?? '';
//     $category = $_GET['category'] ?? '';
//     $collection = $_GET['collection'] ?? '';
//     $customer = $_GET['customer'] ?? '';

//     if (!empty($earning_type)) {
//         $sql .= " AND n.NFT_type = '" . $link->real_escape_string($earning_type) . "'";
//     }

//     if (!empty($category)) {
//         $sql .= " AND n.NFT_category = '" . $link->real_escape_string($category) . "'";
//     }

//     if (!empty($collection)) {
//         $sql .= " AND n.NFT_collection = '" . $link->real_escape_string($collection) . "'";
//     }

//     if (!empty($customer)) {
//         $sql .= " AND n.NFT_owner_address = '" . $link->real_escape_string($customer) . "'";
//     }

// // Execute query
// $query = $sql;
// }else{
 $query = "SELECT `NFT_name`, `NFT_likes`, `NFT_name`, `NFT_price`, `NFT_royalties`, `NFT_resell`, `NFT_owner_address`, `NFT_category`, `NFT_id`, `NFT_image`,`NFT_collection`, `approved`, u.Username FROM `NFT_info` as n JOIN nft_user as u;";
    
// }
 
 
 

 
 ?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-users"></i> NFTs Report </h4>
                         </div> 
                      </div>  
                    </div>
                    
                     <div class="row mt-5">
                        <div class="col-md-12 card p-3">
                            <form class=""> 
                                <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="category" class="">Type</label>
                                            <select name="earning_type" class="form-select dont-select-me form-control" id="earning_type">
                                            <option value="" selected="selected">Select Type</option>
                                            <option value="0">Fixed Price</option>
                                            <option value="1">Time Auction</option>
                                            <option value="2">Open for bids</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="category" class="">Category </label>
                                            <select name="category" class="form-select dont-select-me form-control" id="category">
                                            <option value="" selected="selected">Select Category</option>
                                            <?php
                                            $category = mysqli_query($link, "SELECT * FROM `nft_category` ORDER BY id DESC");
                                            foreach($category as $categorys){
                                                echo '<option value="'.$categorys['category_name'].'">'.$categorys['category_name'].'</option>';
                                            }

                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="collection" class="">Collection</label>
                                            <select name="collection" class="select2 form-control select2-hidden-accessible" id="collection" data-select2-id="select2-data-collection" tabindex="-1" aria-hidden="true">
                                            <option value="" selected="selected" data-select2-id="select2-data-2-qpck">Select collection</option>
                                            <?php
                                            $nft_collection = mysqli_query($link, "SELECT * FROM `nft_collections` ORDER BY id DESC");
                                            foreach($nft_collection as $nft_collections){
                                                echo '<option value="'.$nft_collections['collection_name'].'">'.$nft_collections['collection_name'].'</option>';
                                            }

                                            ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label for="Customer" class="">Customer</label>
                                            <select name="Customer" class="select2 form-control select2-hidden-accessible" id="Customer" >
                                            <option value="" selected="selected" data-select2-id="select2-data-2-qpck">Select Customer</option>
                                            <option value="17">Manami</option>
                                            <option value="16">Sonu</option>
                                            
                                            </select>
                                        </div>
                     
                     
                                    <div class="col-md-1 form-group mt-4 pt-2">
                                        <button type="submit" value="submit" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                    
                                </div> 
                         </form>
                            
                            <!--<div class="mt-5"> <h5> Total  <span> 10.550 BCC </span>	</h5></div>-->
                        </div>
                    </div>
                    
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <table id='' class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">NFT Name</th>
                                  <th scope="col">Token ID</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Collection</th>
                                  <th scope="col">Customer</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php $i=1;
                                  
                                  $report = mysqli_query($link, $query);
                                  if($report){
                                      foreach($report as $reports){
                                      echo '<tr>
                                              <td>'.$i++.'</td>
                                              <td>'.$reports['NFT_name'].'</td>
                                              <td>'.$reports['NFT_id'].'</td>
                                              <td>'.$reports['NFT_category'].'</td>
                                              <td> '.$reports['NFT_collection'].' </td>
                                              <td> '.$reports['Username'].' </td>
                                            </tr>';
                                      }
                                      
                                      
                                  }else{
                                      echo "No data found!";
                                  }
                                  
                                  
                                  ?>
                                
                                
                               
                              </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
           </section> 
           
           <style>
               .radio-inline {text-align: center;}
               .radio-inline input {  height: 26px;}
           </style>
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>      

<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
  <script>
    
            $(document).ready(function() {
                $('#example').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                } );
            } );
    
            $(document).ready(function () {
                $('#datatable').DataTable();
            });
        </script>