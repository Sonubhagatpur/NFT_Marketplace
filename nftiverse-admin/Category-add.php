 <?php include "header.php"; ?>
 
 <?php
// Check if form is submitted
if (isset($_POST['send_message'])) {
    // Sanitize inputs
    $name = htmlspecialchars($_POST['cat_name']); 
    $status = ($_POST['status']);

    if (!empty($name)) { 
 
        $valid_extensions = array('jpg', 'png', 'gif', 'jpeg'); // Valid extensions
        $path = '../collections/';
        $img = $_FILES['img']['name'];
        $tmp = $_FILES['img']['tmp_name'];
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $final_image = rand(1000, 1000000) . "." . $ext;

        if (in_array($ext, $valid_extensions)) {
            $path = $path . strtolower($final_image);

            if (move_uploaded_file($tmp, $path)) {
                $path = "collections/" . strtolower($final_image);

                $sql1 = "INSERT INTO `nft_category`( `category_name`, `category_image`, `status`)
                                 VALUES ('$name', '$path','$status')";
                // Execute query
                $data = mysqli_query($link, $sql1);

                if ($data) {
                    echo "<script>Swal.fire('success','New category added successfully.','success').then((ok)=>{location.href='./categories.php'})</script>";
                    exit; // Exit after success to prevent further execution
                } else {
                    echo "<script>Swal.fire('warning','Something went wrong.','error')</script>";
                }
            } else {
                echo "<script>Swal.fire('Error', 'Failed to upload image.', 'error')</script>";
            }
        } else {
            echo "<script>Swal.fire('Error', 'Only jpg, png, jpeg, or gif file uploads are allowed.', 'error')</script>";
        }


    } else {
        echo "<script>Swal.fire('warning','Please fill in all fields.','warning')</script>";
    }

}

?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-layer-group"></i> Add New Category </h4>
                         </div> 
                      </div>  
                    </div>
                    
                     <div class="row mt-4">
                        <div class="col-md-12">
                           <div class="card p-3">
                             <form method="post" enctype='multipart/form-data'>
         
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 col-form-label">Logo Image <i class="text-danger">*</i></label>
                                    <div class="col-sm-6"> 
                                        <input class="form-control" type="file" name="img" id="profile_img" accept="image/*" required> <br>
                                        <span class="every-cl-rd">Recommended to 350 x 350 px (png, jpg, jpeg).</span>
                                    </div>  
                                </div> 
                                <div class="form-group row mt-3">
                                    <label for="cat_name" class="col-sm-3 col-form-label">Category Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input name="cat_name" value="" class="form-control" type="text" id="cat_name" autocomplete="off" required=""> 
                                    </div> 
         
                                </div> 
                                
                                <div class="form-group row mt-3">
                                    <label for="currency_symbol" class="col-sm-3 col-form-label">Status<i class="text-danger">*</i></label>
                                    <div class="col-sm-6"> 
                                        <select name="status" id="status" class="form-control" required="required" style="width:auto !important">
                                        <option value="0" selected="selected">Active</option>
                                        <option value="1">Inactive</option>
                                        </select>
                                    </div>
                                    
                                </div>  
                              
                                <div class="row mt-3" align="center">
                                    <div class="col-sm-8 col-sm-offset-3">
                                        <!--<button href="" class="btn btn-primary  w-md m-b-5" style="width:auto;">Cancel</button>-->
                                        <button name="send_message" type="submit" class="btn btn-success  w-md m-b-5" style="width:auto;">Create</button>
                                    </div>
                                </div>
                            </form>                    
                    
                    </div>
                        </div>
                    </div>
                </div>
           </section> 
           
           
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>           