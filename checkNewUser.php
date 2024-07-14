<?php

include './config.php';

$address = $_POST['address'];
if(isset($address)){
$data = mysqli_query($link, "SELECT * FROM `nft_user` Where `Useraddress`='$address'");
$num_rows = mysqli_num_rows($data);
if ($num_rows) {
    echo "already registred";
} else {
    $query1 = "INSERT INTO `nft_user`( `Useraddress`) VALUES ('$address ')";
    $data1 = mysqli_query($link, $query1);
    echo "new registred";
}
}else{
    echo "Bad request";
}

?>