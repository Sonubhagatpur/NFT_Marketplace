<?php
include "config.php";

// Sanitize input (assuming $link is your database connection)
$NFT_id = mysqli_real_escape_string($link, $_POST['tokenid']);
$bid = mysqli_real_escape_string($link, $_POST['bid']);
$bidder_Address = mysqli_real_escape_string($link, $_POST['bidder_Address']);
$date = time();

// Check if the user profile is complete
$query = "SELECT `Username`, `Userimage`, `Useremail` FROM `nft_user` WHERE Useraddress='$bidder_Address'";
$data = mysqli_query($link, $query);

if(mysqli_num_rows($data) == 0) {
    http_response_code(400);
    echo json_encode(array("message" => "Sorry! Your Profile Is Not Complete, Please Complete the Profile First", "code" => 400));
} else {
    // Fetch user details
    $result = mysqli_fetch_assoc($data);
    $Useremail = $result['Useremail'];
    $biddername = $result['Username'];
    $image = $result['Userimage']; 

    // Check if the bid already exists
    $sql1 = "SELECT `NFT_bid_amount` FROM `NFT_onlybid` WHERE NFT_id='$NFT_id' AND NFT_bid_amount >= '$bid'";
    $data2 = mysqli_query($link, $sql1);
    
    if(mysqli_num_rows($data2) > 0) {
        http_response_code(400);
        echo json_encode(array("message" => "Sorry! This bid has already been submitted, please place the highest bid.", "code" => 400));
    } else {
        // Check if the bidder already placed a bid
        $sql3 = "SELECT `NFT_bid_amount` FROM `NFT_onlybid` WHERE NFT_id='$NFT_id' AND NFT_bidder_address='$bidder_Address' AND NFT_bid_amount='$bid'";
        $data3 = mysqli_query($link, $sql3);
        
        if(mysqli_num_rows($data3) > 0) {
            http_response_code(400);
            echo json_encode(array("message" => "Your bid has already been submitted on this amount. Please try to bid higher.", "code" => 400));
        } else {
            // Insert new bid
            $sql = "INSERT INTO `NFT_onlybid`(`NFT_id`, `NFT_bid_amount`, `NFT_bidder_address`, `timestamp`) 
                    VALUES ('$NFT_id','$bid','$bidder_Address','$date')";
            $result = mysqli_query($link, $sql);

            if($result) {
                // Update highest bid if current bid is higher
                $heighestBidder = mysqli_query($link, "SELECT NFT_highest_bid FROM NFT_info WHERE NFT_id='$NFT_id'");
                $rowheighestBidder = mysqli_fetch_assoc($heighestBidder);
                $highBid = $rowheighestBidder['NFT_highest_bid'];

                if($highBid < $bid) {
                    $updateQuery = mysqli_query($link, "UPDATE `NFT_info` SET `NFT_highest_bid`='$bid', `NFT_highest_bidder`='$bidder_Address' WHERE `NFT_id`='$NFT_id'");
                    echo json_encode(array("message" => "Congratulations! Bid Submit Successfully And You Are the highest Bidder", "code" => 201));
                } else {
                    echo json_encode(array("message" => "Congratulations! Bid Submit Successfully", "code" => 200));
                }
            } else {
                echo json_encode(array("message" => "Sorry! Something Wrong With Bid", "code" => 400, "query" => $sql));
            }
        }
    }
}
?>
