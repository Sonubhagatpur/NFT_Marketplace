<?php
include 'config.php';
$type = $_POST['type'];
$NFT_id = $_POST['NFT_id'];
$User_address = $_POST['User_address'];
if ($type == 'save') {
    if ($NFT_id != "" && $User_address != "") {
        $select = mysqli_query($link, "SELECT * FROM `NFT_like` WHERE `NFT_id`='$NFT_id' AND `User_address`='$User_address'");
        $numRow = mysqli_num_rows($select);
        if ($numRow == 0) {
            mysqli_query($link, "UPDATE `NFT_info` SET `NFT_likes`=`NFT_likes`+1 WHERE `NFT_id`='$NFT_id'");
            $query = "INSERT INTO `NFT_like`(`NFT_id`, `User_address`) 
              VALUES ('$NFT_id','$User_address')";
            $data = mysqli_query($link, $query);
            if ($data) {
                echo "inserted";
            }
        } else {
            $deleted = mysqli_query($link, "DELETE FROM `NFT_like` WHERE `NFT_id`='$NFT_id' AND `User_address`='$User_address'");
            if ($deleted) {
                mysqli_query($link, "UPDATE `NFT_info` SET `NFT_likes`=`NFT_likes`-1 WHERE `NFT_id`='$NFT_id'");
                echo "deleted";
            }
        }
    } else
        echo "Fill all fields";
}
if ($type == 'get') {
    $result = mysqli_query($link, "SELECT COUNT(`id`) as total_like,`NFT_id` FROM `NFT_like` WHERE `NFT_id`='$NFT_id'");
    $userData = mysqli_fetch_assoc($result);
    echo json_encode($userData);
}

if ($type == 'love') {
    $result = mysqli_query($link, "SELECT * FROM `NFT_like` WHERE `User_address`='$User_address' AND `NFT_id`='$NFT_id'");
    $userData = mysqli_num_rows($result);
    echo json_encode($userData);
}
?>