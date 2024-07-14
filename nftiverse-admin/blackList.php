<?php
include "../config.php";
$blackList = $_POST['blackList'];

if($blackList=="USER"){
    $status = $_POST['status'];
    $userAddress = $_POST['userAddress'];
    
    $update = mysqli_query($link, "UPDATE `nft_user` SET `block`='$status' WHERE `Useraddress`='$userAddress'"); 
    if($update){
        if($status==1){
           echo json_encode(array("message"=>"User has been successfully blocked", "code"=>200)) ;
        }else{
          echo json_encode(array("message"=>"User has been successfully unblocked", "code"=>200)) ;   
        }
        
    }
    
}else if($blackList=="NFT"){
    
    $status = $_POST['status'];
    $NFT_id = $_POST['NFT_id'];
    
    $update = mysqli_query($link, "UPDATE `NFT_info` SET `block`='$status' WHERE `NFT_id`='$NFT_id'");
    if($update){
        if($status==1){
           echo json_encode(array("message"=>"NFT has been successfully blocked", "code"=>200)) ;
        }else{
          echo json_encode(array("message"=>"NFT has been successfully unblocked", "code"=>200)) ;   
        }
        
    }
    
}

?>