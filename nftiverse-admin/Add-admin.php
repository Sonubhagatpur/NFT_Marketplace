 <?php include "header.php";?>
 
<?php
// Check if form is submitted
if (isset($_POST['send_message'])) {
    // Sanitize inputs
    $useremail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $userName = htmlspecialchars($_POST['name']); // Example of sanitization
    $about = htmlspecialchars($_POST['about']);   // Example of sanitization
    $password = $_POST['password'];
    $rePassword = $_POST['re_password'];
    $status = isset($_POST['status']) ? $_POST['status'] : 0; // Default to inactive if not set

    // Validate email format
    if (filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
        // Check if required fields are not empty
        if (!empty($userName) && !empty($useremail) && !empty($password) && !empty($rePassword)) {
            // Check password length
            if (strlen($password) >= 8) {
                // Check if email already exists
                $sql = mysqli_query($link, "SELECT * FROM `admins` WHERE `email` = '$useremail'");
                if (mysqli_num_rows($sql) == 0) {
                    // Check if passwords match
                    if ($password == $rePassword) {
                        // Hash the password securely
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                        // Prepare SQL query to insert new admin
                        $sql1 = "INSERT INTO admins (`name`, `email`, `password`, `create_date`, `verify`, `about`) 
                                 VALUES ('$userName', '$useremail', '$hashedPassword', '" . time() . "', '$status', '$about')";
                        // Execute query
                        $data = mysqli_query($link, $sql1);

                        if ($data) {
                            // Upload image if provided
                            if (!empty($_FILES['img']['name'])) {
                                uploadImage($useremail);
                            }
                            echo "<script>Swal.fire('success','New user created successfully.','success').then((ok)=>{location.href='./Admin-user.php'})</script>";
                            exit; // Exit after success to prevent further execution
                        } else {
                            echo "<script>Swal.fire('warning','Something went wrong.','error')</script>";
                        }
                    } else {
                        echo "<script>Swal.fire('warning','Please enter the same password.','warning')</script>";
                    }
                } else {
                    echo "<script>Swal.fire('warning','This email is already in use.','warning')</script>";
                }
            } else {
                echo "<script>Swal.fire('warning','The password must be at least 8 characters long.','warning')</script>";
            }
        } else {
            echo "<script>Swal.fire('warning','Please fill in all fields.','warning')</script>";
        }
    } else {
        echo "<script>Swal.fire('warning','$useremail is not a valid email address.','warning')</script>";
    }
}

// Function to upload image
function uploadImage($email){
    global $link;
    $valid_extensions = array('jpg', 'png', 'gif', 'jpeg'); // Valid extensions
    $path = '../images/';
    $img = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $final_image = rand(1000, 1000000) . "." . $ext;

    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($final_image);

        if (move_uploaded_file($tmp, $path)) {
            $path = "images/" . strtolower($final_image);
            $image = $path;
            
            $query = mysqli_query($link, "UPDATE `admins` SET `images`='$image' WHERE `email`='$email'");
            if (!$query) {
                echo "<script>Swal.fire('Error', 'Failed to update image path.', 'error')</script>";
            }
        } else {
            echo "<script>Swal.fire('Error', 'Failed to upload image.', 'error')</script>";
        }
    } else {
        echo "<script>Swal.fire('Error', 'Only jpg, png, jpeg, or gif file uploads are allowed.', 'error')</script>";
    }
}
?>

 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-user-plus"></i>  Admin Information </h4>
                         </div> 
                      </div>  
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-12 m-auto">
                           <div class="card p-5">
                               <form method="post" enctype='multipart/form-data'>
                             <input type="hidden" name="id" value="" style="display:none;">
                                
                                <div class="form-group row mt-2">
                                    <label for="firstname" class="col-sm-3 col-form-label">Full Name<span class="text-danger"> *</span></label>
                                    <div class="col-sm-9">
                                        <input name="name" class="form-control" type="text" placeholder="First Name" id="firstname" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-2">
                                    <label for="email" class="col-sm-3 col-form-label">Email Address<span class="text-danger"> *</span></label>
                                    <div class="col-sm-9">
                                        <input name="email" class="form-control" type="text" placeholder="Email Address" id="email" required>
                                    </div>
                                </div> 
            
                                <div class="form-group row mt-2">
                                    <label for="password" class="col-sm-3 col-form-label">Password<span class="text-danger"> *</span></label>
                                    <div class="col-sm-9">
                                        <input name="password" class="form-control" type="password" placeholder="Password" id="password" required>
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <label for="conf_password" class="col-sm-3 col-form-label">Confirm Password<span class="text-danger"> *</span></label>
                                    <div class="col-sm-9">
                                        <input name="re_password" class="form-control" type="password" placeholder="Password" id="conf_password" required>
                                    </div>
                                </div>
            
            
                                <div class="form-group row mt-2">
                                    <label for="about" class="col-sm-3 col-form-label">About</label>
                                    <div class="col-sm-9">
                                        <textarea name="about" placeholder="About" class="form-control" id="about"></textarea>
                                    </div>
                                </div>
            
                                
                                <div class="form-group row mt-2">
                                    <label for="image" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="img" id="image" aria-describedby="fileHelp">
                                        <small id="fileHelp" class="text-muted"></small>
                                        <div class="text-danger">51x38 px(jpg, jpeg, png, gif, ico)</div>
                                        </div>
                                </div> 
            
                     
                                <div class="form-group row mt-2">
                                    <label for="status" class="col-sm-3 col-form-label">Status *</label>
                                    <div class="col-sm-8">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="1" checked="checked" id="status"> Active </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="0" id="status">   Inactive  </label> 
                                    </div>
                                </div>
                     
                                <div class="row mt-2">
                                    <div class="col-sm-12 col-sm-offset-3">
                                        <button type="submit" onclick="history.back()" class="btn btn-primary  w-md m-b-5" style="width: auto;">Cancel</button>
                                        <button type="submit" name="send_message" class="btn btn-success  w-md m-b-5" style="width: auto;">Create</button>
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