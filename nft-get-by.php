<?php
// Include your database connection
include "./config.php";

// Fetch parameters from GET request
$selectedValue = $_GET['selectedValue'];
$type = $_GET['type'];

// Initialize an array to store the results
$newArray = array();

if ($type == 'collection') {
    // Query to fetch NFTs based on selected collection
    $query = "SELECT n.NFT_name, n.NFT_likes, n.NFT_price, n.NFT_royalties, n.NFT_resell, n.NFT_owner_address, 
                     n.NFT_creator_add, n.NFT_discription, n.NFT_category, n.NFT_type, n.NFT_id, n.NFT_image, 
                     n.NFT_time, n.NFT_collection, n.title, n.bid_start_date, n.bid_expiration_date, 
                     c.collection_image, c.collection_name, c.collection_logo, c.collection_description, 
                     c.blockchain_network, c.url, c.category AS collection_category,
                     u.Username AS creator_name, u.Userimage AS creator_image
              FROM NFT_info n
              JOIN nft_collections c ON n.NFT_collection = c.collection_name
              JOIN nft_user u ON n.NFT_creator_add = u.Useraddress
              WHERE n.NFT_collection='$selectedValue' AND n.Mintstatus='1' AND n.approved='1' AND n.block='0'
              ORDER BY n.id DESC";

} elseif ($type == 'category') {
    // Query to fetch NFTs based on selected category
    $query = "SELECT n.NFT_name, n.NFT_likes, n.NFT_price, n.NFT_royalties, n.NFT_resell, n.NFT_owner_address, 
                     n.NFT_creator_add, n.NFT_discription, n.NFT_category, n.NFT_type, n.NFT_id, n.NFT_image, 
                     n.NFT_time, n.NFT_collection, n.title, n.bid_start_date, n.bid_expiration_date, 
                     c.collection_image, c.collection_name, c.collection_logo, c.collection_description, 
                     c.blockchain_network, c.url, c.category AS collection_category,
                     u.Username AS creator_name, u.Userimage AS creator_image
              FROM NFT_info n
              JOIN nft_collections c ON n.NFT_collection = c.collection_name
              JOIN nft_user u ON n.NFT_creator_add = u.Useraddress
              WHERE n.NFT_category='$selectedValue' AND n.Mintstatus='1' AND n.approved='1' AND n.block='0'
              ORDER BY n.id DESC";
}

// $query = "SELECT n.NFT_name, n.NFT_likes, n.NFT_price, n.NFT_royalties, n.NFT_resell, n.NFT_owner_address, 
//                      n.NFT_creator_add, n.NFT_discription, n.NFT_category, n.NFT_type, n.NFT_id, n.NFT_image, 
//                      n.NFT_time, n.NFT_collection, n.title, n.bid_start_date, n.bid_expiration_date, 
//                      c.collection_image, c.collection_name, c.collection_logo, c.collection_description, 
//                      c.blockchain_network, c.url, c.category AS collection_category,
//                      u.Username AS creator_name, u.Userimage AS creator_image
//               FROM NFT_info n
//               JOIN nft_collections c ON n.NFT_collection = c.collection_name
//               JOIN nft_user u ON n.NFT_creator_add = u.Useraddress
//               WHERE n.Mintstatus='1' AND n.approved='1' AND n.block='0'
//               ORDER BY n.id DESC";

// Execute the query
$result = $link->query($query);

// Fetch results into an array
while ($row = mysqli_fetch_assoc($result)) {
    $newArray[] = $row;
}

echo json_encode($newArray);


?>
