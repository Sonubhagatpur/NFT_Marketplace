<?php
include '../config.php';

$NFT_id = $_POST['tokenId'];
$type = $_POST['action_type'];


if($type=="isapprove"){
$approved = $_POST['approved'];
$sql = "UPDATE `NFT_info` SET `approved`='$approved' WHERE `NFT_id`='$NFT_id'";
$update = mysqli_query($link, $sql);
if($update){
    echo json_encode(array("message"=>"Approval status update",  "code"=>200, $sql));
}else{
  echo json_encode(array("message"=>"Internal server error",  "code"=>500, $sql));  
}
}

if($type=="isblacklist"){
$block = $_POST['block'];
$sql = "UPDATE `NFT_info` SET `block`='$block' WHERE `NFT_id`='$NFT_id'";
$update = mysqli_query($link, $sql);
if($update){
    echo json_encode(array("message"=>"NFT blocked successfully",  "code"=>200, $sql));
}else{
  echo json_encode(array("message"=>"Internal server error",  "code"=>500, $sql));  
}
}

?>