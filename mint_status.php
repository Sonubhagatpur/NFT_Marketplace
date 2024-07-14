<?php
include "./config.php"; 
$NFT_id=$_POST['NFT_id'];

$query="UPDATE `NFT_info` SET `Mintstatus`='1' WHERE `NFT_id`='$NFT_id'";
    $result =$link->query($query);
    if($result)
    {
        echo "UPDATE";
    }
    else{
        echo "Not UPDATE ";
    }
    
$query="UPDATE `Nft_activity` SET `Mintstatus`='1' WHERE `Nft_id`='$NFT_id'";
    $result =$link->query($query);
    if($result)
    {
        echo "UPDATE";
    }
    else{
        echo "Not UPDATE ";
    }
?>