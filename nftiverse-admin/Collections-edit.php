 <?php include "header.php";
 
 
 $id = $_GET['id'];
 
 if (isset($_POST['edit'])) {
    $name = mysqli_real_escape_string($link, $_POST['cat_name']);
    $status = mysqli_real_escape_string($link, $_POST['status']);

    // Check if an image is selected
    if (!empty($_FILES['img']['name'])) {
        $valid_extensions = array('jpg', 'png', 'gif', 'jpeg'); // valid extensions
        $path = '../collections/';
        $img = $_FILES['img']['name'];
        $tmp = $_FILES['img']['tmp_name'];
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $final_image = rand(1000, 1000000) . "." . $ext;

        if (in_array($ext, $valid_extensions)) {
            $path = $path . strtolower($final_image);

            if (move_uploaded_file($tmp, $path)) {
                $path = "collections/" . strtolower($final_image);
                $image = $actual_link . "/" . $path;
                mysqli_query($link, "UPDATE `nft_category` SET `category_image`='$image' WHERE `id`='$id'");
            
                
            } else {
                echo "<script>Swal.fire('Error', 'There was something wrong uploading the file', 'error')</script>";
            }
        } else {
            echo "<script>Swal.fire('Error', 'Only jpg, png , jpeg or gif file upload is allowed.', 'error')</script>";
        }
    }
  
  $update = mysqli_query($link, "UPDATE `nft_category` SET `category_name`='$name', `status`='$status' WHERE `id`='$id'");

    if ($update) {
        echo "<script>Swal.fire('Success', 'category Edited successfully.', 'success').then((ok)=>{
        window.location.href='./categories.php';
    })</script>";
    }else{
        echo "<script>Swal.fire('Error', 'Internal server error.', 'error')</script>";
    }
}
 
 
 
 $category = mysqli_query($link, "SELECT * FROM `nft_collections` WHERE `id`='$id'");
 $nft_collections = mysqli_fetch_assoc($category);
 
 ?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-layer-group"></i> Edit Collections </h4>
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
                                        <input class="form-control" type="file" name="logo" id="profile_img" accept="image/*">  <br>
                                        <span class="every-cl-rd">Recommended to 350 x 350 px (png, jpg, jpeg).</span>
                                    </div>  
                                </div> 
                                
                                <div class="form-group row mt-3">
                                    <label for="image" class="col-sm-3 col-form-label">Banner Image <i class="text-danger">*</i></label>
                                    <div class="col-sm-6"> 
                                        <input class="form-control" type="file" name="logo" id="profile_img" accept="image/*"> <br>
                                        <span class="every-cl-rd">Recommended to 350 x 350 px (png, jpg, jpeg).</span>
                                    </div>  
                                </div> 
                                
                                <div class="form-group row mt-3">
                                    <label for="cat_name" class="col-sm-3 col-form-label">Collections Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input name="cat_name" value="<?php echo $nft_collections['collection_name']; ?>" class="form-control" type="text" id="cat_name" autocomplete="off" required=""> 
                                    </div> 
         
                                </div> 
                                <div class="form-group row mt-3">
                                    <label for="description" class="col-sm-3 col-form-label">Description </label>
                                    <div class="col-sm-6"> 
                                        <textarea name="description" cols="30" rows="3" id="description" class="form-control" style="width:100%"><?php echo $nft_collections['collection_name']; ?></textarea>
                                    </div>
                                    
                                </div> 
                                <div class="form-group row mt-3">
                                    <label for="currency_symbol" class="col-sm-3 col-form-label">Category<i class="text-danger">*</i></label>
                                    <div class="col-sm-6"> 
                                        <select name="status" id="status" class="form-control" required="required">
                                        <option value="1" selected="selected">Art</option>
                                        <option value="0">Fifma</option>
                                        </select>
                                    </div>
                                    
                                </div>  
                                
                                 <div class="form-group row mt-3">
                                    <label for="currency_symbol" class="col-sm-3 col-form-label">User<i class="text-danger">*</i></label>
                                    <div class="col-sm-6"> 
                                        <select name="status" id="status" class="form-control" required="required">
                                        <option value="1" selected="selected">8746h586f576hf</option>
                                        <option value="0">8746h586f576hf</option>
                                        </select>
                                    </div>
                                    
                                </div>
                              
                                <div class="row mt-3" align="center">
                                    <div class="col-sm-8 col-sm-offset-3">
                                        <a href="" class="btn btn-primary  w-md m-b-5">Cancel</a>
                                        <a type="submit" class="btn btn-success  w-md m-b-5">Update</a>
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