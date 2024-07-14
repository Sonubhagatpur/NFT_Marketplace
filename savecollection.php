<?php
include "config.php";

$Displayname = $_POST['Displayname'];
$title = $_POST['title'];
$blockchain_network = $_POST['blockchain_network'];
$discription = $_POST['discription'];
$url = $_POST['url'];
$category = $_POST['category'];
$owneradd = $_POST['owneraddress'];

if ($Displayname == "" || $title == "" || $blockchain_network == "" || $discription == "" || $owneradd == "") {
    echo json_encode(array("message" => "Required all fields", "code" => 400));
} else {
    $valid_extension = array('jpeg', 'jpg', 'png', 'gif');
    $path = "./collections/";

    $coverImage = $_FILES['coverImage']['name'];
    $coverImage_tmp1 = $_FILES['coverImage']['tmp_name'];
    $ext = strtolower(pathinfo($coverImage, PATHINFO_EXTENSION));

    $final_image = rand(1000, 1000000) . $coverImage;

    $logoImage = $_FILES['logoImage']['name'];
    $coverImage_tmp = $_FILES['logoImage']['tmp_name'];
    $ext1 = strtolower(pathinfo($logoImage, PATHINFO_EXTENSION));

    $final_logoImage = rand(10000, 1000000) . $logoImage;
    $pathlogoImage = $path . strtolower($final_logoImage);

    $exist = "SELECT * FROM nft_collections Where (collection_name like'%" . $Displayname . "%') ORDER BY ID DESC ";
    $dataexist = mysqli_query($link, $exist);

    if (mysqli_num_rows($dataexist) > 0) {
        echo json_encode(array("message" => "Collection Name Already Exist", "code" => 400));

    } else {
        if (in_array($ext, $valid_extension)) {
            move_uploaded_file($coverImage_tmp1, $pathlogoImage);

            $path = $path . strtolower($final_image);

            move_uploaded_file($coverImage_tmp, $path);
            $path = "collections/" . strtolower($final_image);
            $pathlogoImage = "collections/" . strtolower($final_logoImage);
            $query = "INSERT INTO `nft_collections`( `collection_name`, `collection_logo`, `Address`,`collection_image`,`collection_description`,`url`, `title`, `blockchain_network`, `category`) 
                   VALUES ('$Displayname','$path','$owneradd','$pathlogoImage','$discription','$url', '$title', '$blockchain_network', '$category')";
            $data = mysqli_query($link, $query);
            if ($data) {
                echo json_encode(array("message" => "Congratulation! Collection Created Successfully", "code" => 200));
            } else {
                // echo $query;
                echo json_encode(array("message" => "Internal server error", "code" => 500));
            }

        } else {
            echo json_encode(array("message" => "Only 'jpeg','jpg','png' and 'gif' file upload is allowed.", "code" => 400));
        }
    }

}

?>