 <?php include "header.php";?>
 
<?php

if (isset($_POST['send_message'])) {
    // Sanitize inputs
    $collection_name = htmlspecialchars($_POST['collection_name']);
    $collection_description = htmlspecialchars($_POST['collection_description']);
    $collection_category = htmlspecialchars($_POST['collection_category']);
    $collection_user = htmlspecialchars($_POST['collection_user']);

    // File upload handling for collection_image
    $valid_extensions = array('jpg', 'png', 'gif', 'jpeg');
    $upload_dir = '../collections/';

    // Handle collection_image upload
    if (!empty($_FILES['collection_image']['name'])) {
        $collection_image = $_FILES['collection_image']['name'];
        $tmp_image = $_FILES['collection_image']['tmp_name'];
        $image_ext = strtolower(pathinfo($collection_image, PATHINFO_EXTENSION));
        $final_image = rand(1000, 1000000) . "." . $image_ext;

        if (in_array($image_ext, $valid_extensions)) {
            $upload_path_image = $upload_dir . strtolower($final_image);

            if (move_uploaded_file($tmp_image, $upload_path_image)) {
                $collection_image_path = "collections/" . strtolower($final_image);
            } else {
                echo "<script>Swal.fire('Error', 'Failed to upload collection image.', 'error')</script>";
                exit;
            }
        } else {
            echo "<script>Swal.fire('Error', 'Only jpg, png, jpeg, or gif file uploads are allowed for collection image.', 'error')</script>";
            exit;
        }
    } else {
        echo "<script>Swal.fire('Error', 'Please upload a collection image.', 'error')</script>";
        exit;
    }

    // Handle collection_logo upload
    if (!empty($_FILES['collection_logo']['name'])) {
        $collection_logo = $_FILES['collection_logo']['name'];
        $tmp_logo = $_FILES['collection_logo']['tmp_name'];
        $logo_ext = strtolower(pathinfo($collection_logo, PATHINFO_EXTENSION));
        $final_logo = rand(1000, 1000000) . "." . $logo_ext;

        if (in_array($logo_ext, $valid_extensions)) {
            $upload_path_logo = $upload_dir . strtolower($final_logo);

            if (move_uploaded_file($tmp_logo, $upload_path_logo)) {
                $collection_logo_path = "collections/" . strtolower($final_logo);
            } else {
                echo "<script>Swal.fire('Error', 'Failed to upload collection logo.', 'error')</script>";
                exit;
            }
        } else {
            echo "<script>Swal.fire('Error', 'Only jpg, png, jpeg, or gif file uploads are allowed for collection logo.', 'error')</script>";
            exit;
        }
    } else {
        echo "<script>Swal.fire('Error', 'Please upload a collection logo.', 'error')</script>";
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO `nft_collections` (`collection_image`, `collection_name`, `collection_logo`, `collection_time`, `collection_description`, `title`) 
            VALUES ('$collection_image_path', '$collection_name', '$collection_logo_path', '" . time() . "', '$collection_description', '$collection_category')";
    
    $result = mysqli_query($link, $sql);

    if ($result) {
        echo "<script>Swal.fire('success','New collection added successfully.','success').then((ok)=>{location.href='./Collections.php'})</script>";
        exit;
    } else {
        echo "<script>Swal.fire('warning','Something went wrong.','error')</script>";
    }
}

?>

 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-layer-group"></i> Add New Collections </h4>
                         </div> 
                      </div>  
                    </div>
                    
                     <div class="row mt-4">
                        <div class="col-md-12">
                           <div class="card p-3">
                             <form method="post" enctype="multipart/form-data">
         
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 col-form-label">Logo Image <i class="text-danger">*</i></label>
                                    <div class="col-sm-6"> 
                                        <input class="form-control" type="file" name="collection_image" id="profile_img"> <br>
                                        <span class="every-cl-rd">Recommended to 350 x 350 px (png, jpg, jpeg).</span>
                                    </div>  
                                </div> 
                                
                                <div class="form-group row mt-3">
                                    <label for="image" class="col-sm-3 col-form-label">Banner Image <i class="text-danger">*</i></label>
                                    <div class="col-sm-6"> 
                                        <input class="form-control" type="file" name="collection_logo" id="profile_img"> <br>
                                        <span class="every-cl-rd">Recommended to 350 x 350 px (png, jpg, jpeg).</span>
                                    </div>  
                                </div> 
                                
                                <div class="form-group row mt-3">
                                    <label for="cat_name" class="col-sm-3 col-form-label">Collections Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input name="collection_name" value="" class="form-control" type="text" id="cat_name" autocomplete="off" required=""> 
                                    </div> 
         
                                </div> 
                                <div class="form-group row mt-3">
                                    <label for="description" class="col-sm-3 col-form-label">Description </label>
                                    <div class="col-sm-6"> 
                                        <textarea name="collection_description" cols="30" rows="3" id="description" class="form-control" style="width:100%"></textarea>
                                    </div>
                                    
                                </div> 
                                <div class="form-group row mt-3">
                                    <label for="currency_symbol" class="col-sm-3 col-form-label">Category<i class="text-danger">*</i></label>
                                    <div class="col-sm-6"> 
                                        <select name="collection_category" id="status" class="form-control" required="required">
                                        <option value="1" selected="selected">Art</option>
                                        <option value="0">Fifma</option>
                                        </select>
                                    </div>
                                    
                                </div>  
                                
                                 <div class="form-group row mt-3">
                                    <label for="currency_symbol" class="col-sm-3 col-form-label">User<i class="text-danger">*</i></label>
                                    <div class="col-sm-6"> 
                                        <select name="collection_user" id="status" class="form-control" required="required">
                                        <option value="1" selected="selected">8746h586f576hf</option>
                                        <option value="0">8746h586f576hf</option>
                                        </select>
                                    </div>
                                    
                                </div>
                              
                                <div class="row mt-3" align="center">
                                    <div class="col-sm-8 col-sm-offset-3">
                                <button type="submit" name="send_message" class="btn btn-success w-md m-b-5">Create</button>
                                <!--<a href="javascript:history.back();" class="btn btn-primary w-md m-b-5">Cancel</a>-->
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