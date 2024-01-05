<?php
include "config.php";
$address = $_POST['address'];
$type = $_POST['type'];
$NFT_ids = $_POST['NFT_ids'];

if ($type == 'userdetails') {
    $query = "SELECT * FROM nft_user Where Useraddress='$address'";
    $result = $link->query($query);
    $newArray = array();
    $userData = mysqli_fetch_assoc($result);
    echo json_encode($userData);
}


?>