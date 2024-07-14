<?php

include '../config.php';

$address = $_POST['address'];
$data = mysqli_query($link, "SELECT `Username`, `Useraddress`, `Userimage`, `Useremail`,  `Userportfolio`, `Userbio`,  `coverphoto`, `url` FROM `nft_user` Where `Useraddress`='$address'");
$num_rows = mysqli_num_rows($data);
if ($num_rows) {
    $row = mysqli_fetch_assoc($data);
    echo json_encode($row);
} else {
    echo "User not fount.";
}

?>