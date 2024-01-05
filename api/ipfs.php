<?php
$tokenId = $_POST['tokenId'];
$bserUri = $_POST['baseURI'];
$bserUri = substr($bserUri, 6);
$url = file_get_contents('https://ipfs.io/ipfs' . $bserUri . $tokenId);
echo $url;
?>