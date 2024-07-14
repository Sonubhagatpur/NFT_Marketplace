<?php
include "./config.php";

// Function to validate file extensions
function isValidExtension($file, $valid_extensions) {
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    return in_array($ext, $valid_extensions);
}

// Valid extensions for images
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

// Base path for images
$image_path = 'images/';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // File 1: Profile Image
    if (!empty($_FILES['profileImage']['name'])) {
        $img = $_FILES['profileImage'];
        if (isValidExtension($img, $valid_extensions)) {
            $final_image = rand(1000, 1000000) . '_' . $img['name'];
            $path = $image_path . strtolower($final_image);
            if (move_uploaded_file($img['tmp_name'], $path)) {
                $sql = "UPDATE `nft_user` SET `Userimage`='$path' WHERE `Useraddress`='" . $_POST['address'] . "'";
                $result = mysqli_query($link, $sql);
                if ($result) {
                    // echo "Profile image uploaded successfully.";
                } else {
                    // echo "Failed to update profile image.";
                    echo json_encode(array("message" => "Failed to update profile image.", "code"=>400));
                }
            } else {
                // echo "Failed to upload profile image.";
                echo json_encode(array("message" => "Failed to upload profile image.", "code"=>400));
            }
        } else {
            // echo "Invalid profile image format.";
            echo json_encode(array("message" => "Invalid profile image format.", "code"=>400));
        }
    }

    // File 2: Cover Photo
    if (!empty($_FILES['coverImage']['name'])) {
        $img2 = $_FILES['coverImage'];
        if (isValidExtension($img2, $valid_extensions)) {
            $final_image2 = rand(1000, 1000000) . '_' . $img2['name'];
            $path2 = $image_path . strtolower($final_image2);
            if (move_uploaded_file($img2['tmp_name'], $path2)) {
                $sql = "UPDATE `nft_user` SET `coverphoto`='$path2' WHERE `Useraddress`='" . $_POST['address'] . "'";
                $result = mysqli_query($link, $sql);
                if ($result) {
                    // echo "Cover photo uploaded successfully.";
                } else {
                    // echo "Failed to update cover photo.";
                }
            } else {
                // echo "Failed to upload cover photo.";
                echo json_encode(array("message" => "Failed to upload cover photo.", "code"=>400));
            }
        } else {
            // echo "Invalid cover photo format.";
            echo json_encode(array("message" => "Invalid cover photo format.", "code"=>400));
        }
    }

    // Update other user information
    $sql = "UPDATE `nft_user` SET `Username`='" . $_POST['Username'] . "', `Useremail`='" . $_POST['Email'] . "', `url`='" . $_POST['url'] . "', `Userbio`='" . $_POST['Bio'] . "', `Userportfolio`='" . $_POST['Userportfolio'] . "' WHERE `Useraddress`='" . $_POST['address'] . "'";
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo json_encode(array("message" => "User information updated successfully.", "code"=>200));
    } else {
        echo json_encode(array("message" => "Failed to update user information.", "code"=>500));
        // echo "Failed to update user information.";
    }
}

?>
