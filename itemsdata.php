<?php
include "./config.php";
$address = $_POST['address'];
$type = $_POST['type'];
$NFT_ids = $_POST['NFT_ids'];
//  echo $NFT_ids;

if ($type == 'owned') {

    $query = "SELECT n.NFT_name, n.NFT_likes, n.NFT_price, n.NFT_royalties, n.NFT_resell, n.NFT_owner_address, n.NFT_creator_add, n.NFT_discription, n.NFT_category, n.NFT_type, n.NFT_id, n.NFT_image, n.NFT_time, n.NFT_collection, n.title, n.bid_start_date, n.bid_expiration_date, c.collection_image, c.collection_name, c.collection_logo,  c.collection_description, c.blockchain_network, c.url, c.category AS collection_category FROM NFT_info n JOIN nft_collections c ON n.NFT_collection = c.collection_name WHERE n.NFT_owner_address='$address' AND n.Mintstatus='1' AND n.block=0 ORDER BY n.id DESC;";
    $result = $link->query($query);
    $newArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($newArray, $row);

    }
    echo json_encode($newArray);
}
if ($type == 'created') {
    $query = "SELECT n.NFT_name, n.NFT_likes, n.NFT_price, n.NFT_royalties, n.NFT_resell, n.NFT_owner_address, n.NFT_creator_add, n.NFT_discription, n.NFT_category, n.NFT_type, n.NFT_id, n.NFT_image, n.NFT_time, n.NFT_collection, n.title, n.bid_start_date, n.bid_expiration_date, c.collection_image, c.collection_name, c.collection_logo,  c.collection_description, c.blockchain_network, c.url, c.category AS collection_category FROM NFT_info n JOIN nft_collections c ON n.NFT_collection = c.collection_name WHERE n.NFT_creator_add='$address' AND n.Mintstatus='1' AND n.block=0  ORDER BY n.id DESC;";
    $result = $link->query($query);
    $newArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($newArray, $row);

    }
    echo json_encode($newArray);
}
if ($type == 'Sale') {
    $query = "SELECT * FROM `NFT_info` WHERE  NFT_owner_address='$address' AND `NFT_resell`='1' AND Mintstatus='1' ORDER BY ID DESC";
    $result = $link->query($query);
    $newArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($newArray, $row);

    }
    echo json_encode($newArray);

}

if ($type == 'liked') {
    $query = "SELECT n.NFT_name, n.NFT_likes, n.NFT_price, n.NFT_royalties, n.NFT_resell, n.NFT_owner_address, n.NFT_creator_add, n.NFT_discription, n.NFT_category, n.NFT_type, n.NFT_id, n.NFT_image, n.NFT_time, n.NFT_collection, n.title, n.bid_start_date, n.bid_expiration_date, c.collection_image, c.collection_name, c.collection_logo, c.collection_description, c.blockchain_network, c.url, c.category AS collection_category, l.time AS liked_time FROM NFT_info n JOIN nft_collections c ON n.NFT_collection = c.collection_name JOIN NFT_like l ON n.NFT_id = l.NFT_id WHERE n.NFT_creator_add = '$address' AND n.Mintstatus='1' AND n.block=0 ORDER BY n.id DESC;";
    $result = $link->query($query);
    $newArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($newArray, $row);

    }
    echo json_encode($newArray);
}

if ($type == 'collections') {
    $query = "SELECT * FROM `nft_collections` WHERE `Address`='$address' ORDER BY id DESC";
    $result = $link->query($query);
    $newArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($newArray, $row);

    }
    echo json_encode($newArray);
}

?>