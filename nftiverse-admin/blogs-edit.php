 <?php include "header.php";
 
 
 $id = $_GET['id'];
 
 $query = mysqli_query($link, "SELECT * FROM `blogs` WHERE `id`='$id'");
 $row = mysqli_fetch_assoc($query);
 
 
if (isset($_POST['send_message'])) {
    $title = htmlspecialchars($_POST['title']); // Example of sanitization
    $short_description = htmlspecialchars($_POST['short_description']);   // Example of sanitization
    $description = htmlspecialchars($_POST['editor']);

    // Check if an image is selected
    $has_image = isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK;

    // Check if all required fields are not empty
    if (!empty($title) && !empty($short_description) && !empty($description)) {

        // Initialize variables for SQL query
        $update_image_sql = '';
        $update_fields_sql = '';

        // Process image if selected
        if ($has_image) {
            $valid_extensions = array('jpg', 'png', 'gif', 'jpeg'); // Valid extensions
            $path = '../images/';
            $img = $_FILES['img']['name'];
            $tmp = $_FILES['img']['tmp_name'];
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            $final_image = rand(1000, 1000000) . "." . $ext;

            if (in_array($ext, $valid_extensions)) {
                $path = $path . strtolower($final_image);

                if (move_uploaded_file($tmp, $path)) {
                    $image_path = "images/" . strtolower($final_image);
                    $update_image_sql = ", `image` = '$image_path'";
                } else {
                    echo "<script>Swal.fire('Error', 'Failed to upload image.', 'error')</script>";
                    exit; // Exit script if image upload fails
                }
            } else {
                echo "<script>Swal.fire('Error', 'Only jpg, png, jpeg, or gif file uploads are allowed.', 'error')</script>";
                exit; // Exit script if invalid image format
            }
        }

        // Build SQL query for updating fields
        $update_fields_sql = "UPDATE `blogs` SET `title` = '$title', `short_description` = '$short_description', `description` = '$description'";

        // Append image update if necessary
        if (!empty($update_image_sql)) {
            $update_fields_sql .= $update_image_sql;
        }

        $update_fields_sql .= " WHERE `id` = $id"; // Replace `id` with your actual primary key column

        $data = mysqli_query($link, $update_fields_sql);

        if ($data) {
            echo "<script>Swal.fire('success', 'Blog updated successfully.', 'success').then((ok) => { location.href = './All-blogs.php' })</script>";
            exit; // Exit after success to prevent further execution
        } else {
            echo "<script>Swal.fire('warning', 'Something went wrong.', 'error')</script>";
        }
    } else {
        echo "<script>Swal.fire('warning', 'Please fill in all fields.', 'warning')</script>";
    }
}

 
 ?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-blog"></i> Edit Blogs </h4>
                         </div> 
                      </div>  
                    </div>
                    
                     <div class="row crancy-gap-30">
                            <div class="col-12">
                                <!-- Charts One -->
                                <div class="charts-main charts-home-one mg-top-30">
                                   <form method="post" enctype='multipart/form-data'>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="img">Select image:</label>
                                                    <input type="file" id="img" name="img" accept="image/*">
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="">Title</label>
                                                    <div class="form-group__input">
                                                        <input class="crancy-wc__form-input w-100" type="text"
                                                            name="title" value="<?php echo $row['title']; ?>" required="required" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label for="">Short description</label>
                                                    <div class="form-group__input">
                                                        <input class="crancy-wc__form-input w-100" type="text"
                                                            name="short_description" value="<?php echo $row['short_description']; ?>"
                                                            required="required" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label for="">Description</label>
                                                    <textarea class="form-control" name="editor" id="editor"
                                                        rows="3"><?php echo $row['description']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <button name="send_message" class="ntfmax-wc__btn" type="submit">
                                                    Edit
                                                </button>
                                            </div>
                                        </div>
                                        </form>
                                </div>
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