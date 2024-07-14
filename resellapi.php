<?php
include "config.php";
$price = $_POST['price'];
$bid_starting_date = $_POST['bid_starting_date'];
$bid_expiration_date = $_POST['bid_expiration_date'];
$type = $_POST['type'];
$NFT_id = $_POST['NFT_id'];

$query = "UPDATE `NFT_info` SET `NFT_price`='$price',`NFT_resell`='1', `NFT_type`='$type', `bid_expiration_date`='$bid_expiration_date', `bid_start_date`='$bid_starting_date' WHERE `NFT_id`='$NFT_id'";
$data = mysqli_query($link, $query);
if ($data) {

    echo json_encode(array("message" => "Item was Updated.", "code" => 200, $query));
} else {

    echo json_encode(array("message" => "Unable to Updated item.", "code" => 400, $query));
}

?>