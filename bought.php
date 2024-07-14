<?php
include "./config.php";

$owner = $_POST['buyerAddress'];
$id = $_POST['tokenid'];


$nftData = mysqli_query($link, "SELECT * FROM `NFT_info` WHERE `NFT_id`='$id'");
$rowNFT = mysqli_fetch_assoc($nftData);
$price = $rowNFT['NFT_price'];
$ownerAddress = $rowNFT['NFT_owner_address'];
$NFT_image = $rowNFT["NFT_image"];
$NFT_name = $rowNFT["NFT_name"];
$collection = $rowNFT['NFT_collection'];
$resell = '0';

// query for buyer information 
$query1 = "SELECT `Id`, `Username`,`Userimage` FROM `nft_user` WHERE Useraddress='{$owner}'";

$result1 = $link->query($query1);
$res = $result1->fetch_assoc();
$userimage = $res['Userimage'];
$OwnerName = $res['Username'];

// query fo seller information
$query2 = "SELECT `Id`, `Username`,`Userimage` FROM `nft_user` WHERE Useraddress='{$ownerAddress}'";
$result2 = $link->query($query2);
$res1 = $result2->fetch_assoc();
$sellerimage = $res1['Userimage'];
$sellerName = $res1['Username'];

$update = "UPDATE NFT_info SET `NFT_owner_address`='$owner',`NFT_resell`='$resell' WHERE NFT_id='$id' ";
$dataupdate = mysqli_query($link, $update);

$date = time();

$query = "INSERT INTO `NFT_buy`( `Username`, `image`,`Address`, `value`, `time`,`NFT_image`,`NFT_name`,`NFT_id`,`collection`,`currency`) 
    VALUES ('{$OwnerName}','{$userimage}','{$owner}','{$price}','{$date}','{$NFT_image}','{$NFT_name}','{$id}','{$collection}','BCC')";
$result = mysqli_query($link, $query);
// if ($result) {
//     $sqlnew = "INSERT INTO `Nft_activity` ( `Nft_name`, `Nft_image`, `nft_type`, `Date`,`Address`,`Nft_id`,`Nft_price`,`timestamp`) 
//             VALUES ( '$NFT_name', '$NFT_image', 'Bought', '$date','$owner','$id','$price','" . time() . "')";
//     $datanew = mysqli_query($link, $sqlnew);
// } else {
//     echo "failed BUY ";
// }

$queryseller = "INSERT INTO `Nft_sell`( `Username`, `image`,`Address`, `value`, `Time`,`Nft_image`,`NFT_name`,`nft_id`,`collection`,`currency`)
    VALUES ('{$OwnerName}','{$userimage}','{$ownerAddress}','{$price}','{$date}','{$NFT_image}','{$NFT_name}','{$id}','{$collection}','BCC')";
$resultseller = mysqli_query($link, $queryseller);
if ($resultseller) {
    $sqlnew = "INSERT INTO `Nft_activity` ( `Nft_name`, `Nft_image`, `nft_type`, `Date`,`Address`,`Nft_id`,`Nft_price`,`timestamp`, `to_address`) 
                VALUES ( '$NFT_name', '$NFT_image', 'Sold', '$date','$ownerAddress','$id','$price','" . time() . "', '$owner')";
    $datanew = mysqli_query($link, $sqlnew);
} else { 
    echo "failed SEll";
}



?>