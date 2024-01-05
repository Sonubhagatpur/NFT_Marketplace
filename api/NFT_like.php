<?php
include 'config.php';
$type = $_POST['type'];
$NFT_id = $_POST['NFT_id'];
$NFT_image = $_POST['NFT_image'];
$NFT_name = $_POST['NFT_name'];
$User_address = $_POST['User_address'];
if ($type == 'save') {
    if ($NFT_id != "" && $User_address != "" && $NFT_name != "" && $NFT_image != "") {
        $select = mysqli_query($link, "SELECT * FROM `NFT_like` WHERE `NFT_id`='$NFT_id' AND `User_address`='$User_address'");
        $numRow = mysqli_num_rows($select);
        if ($numRow == 0) {
            $query = "INSERT INTO `NFT_like`(`NFT_id`, `NFT_image`, `NFT_name`, `User_address`) 
VALUES ('$NFT_id','$NFT_image','$NFT_name','$User_address')";
            $data = mysqli_query($link, $query);
            if ($data) {
                echo "inserted";
            }
        } else {
            $deleted = mysqli_query($link, "DELETE FROM `NFT_like` WHERE `NFT_id`='$NFT_id' AND `User_address`='$User_address'");
            if ($deleted) {
                echo "deleted";
            }
        }
    } else
        echo "Fill all fields";
}
if ($type == 'get') {
    $result = mysqli_query($link, "SELECT COUNT(`id`) as total_like,`NFT_id`,`NFT_image`,`NFT_name`,`User_address` FROM `NFT_like` WHERE `NFT_id`='$NFT_id'");
    $userData = mysqli_fetch_assoc($result);
    echo json_encode($userData);
}

if ($type == 'faverate') {
    $newArray = array();
    $result = mysqli_query($link, "SELECT * FROM `NFT_like` WHERE `User_address`='$User_address'");
    while ($userData = mysqli_fetch_assoc($result)) {
        array_push($newArray, $userData);
    }

    echo json_encode($newArray);
}

if ($type == 'love') {
    $result = mysqli_query($link, "SELECT * FROM `NFT_like` WHERE `User_address`='$User_address' AND `NFT_id`='$NFT_id'");
    $userData = mysqli_fetch_assoc($result);
    echo json_encode($userData);
}
?>