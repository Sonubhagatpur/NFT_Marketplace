<?php

include "config.php";

$address = $_POST['address'];
$stringstartswith = str_starts_with($address, '0x') ? true : false;
echo $stringstartswith;
if ($stringstartswith) {
    $data = mysqli_query($link, "SELECT * FROM `nft_user` Where Useraddress='" . $address . "'");
    $num_rows = mysqli_num_rows($data);
    if ($num_rows) {
    } else {
        $query1 = "INSERT INTO `nft_user`( `Useraddress`) VALUES ('" . $address . "')";
        $data1 = $link->query($query1);
        echo 0;
    }
}