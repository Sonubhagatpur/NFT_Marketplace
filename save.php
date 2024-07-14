<?php
include "./config.php";
$NFT_type = $_POST['NFT_type'];
$nftid = $_POST['tokenid'];
$nftname = $_POST['tokenName'];
$nftprice = $_POST['tokenprice'];
$nftroyalities = $_POST['tokenroyal'];
$nftowneradd = $_POST['tokenowneradd'];
$nftdesc = $_POST['tokendesc'];
$Categoryid = $_POST['category'];
$nftcollection = $_POST['collection'];
$title = $_POST['title'];
$bid_start_date = $_POST['bid_start_date'];
$bid_expiration_date = $_POST['bid_expiration_date'];

if (empty($nftid) || empty($nftname) || empty($nftprice) || empty($nftowneradd)) {
    echo json_encode(array("message" => "Fill All required fields.", "code" => 400));
} else {

    if (strpos($nftdesc, '"')) {
        $nftdesc = str_replace('"', '&', $nftdesc);
    } else if (strpos($nftdesc, "'")) {
        $nftdesc = str_replace("'", '&', $nftdesc);
    }

    $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";
    $valid_extensions = array('jpg', 'png', 'gif'); // valid extensions
    $path = './uploads/';
    $img = $_FILES['tokenImage']['name'];
    $tmp = $_FILES['tokenImage']['tmp_name'];
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $final_image = rand(1000, 1000000) . "." . $ext;

    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($final_image);

        if (move_uploaded_file($tmp, $path)) {
            $path = "uploads/" . strtolower($final_image);
            date_default_timezone_set("Asia/Kolkata");
            $date = date("Y-m-d h:i:s");

            $sql = "INSERT INTO `NFT_info`( `NFT_name`, `NFT_price`, `NFT_royalties`, `NFT_resell`,`NFT_owner_address`, `NFT_creator_add`, `NFT_discription`,`NFT_category`, `NFT_id`, `NFT_image`, `NFT_time`, `NFT_collection`, `title`, `bid_start_date`, `bid_expiration_date`,`NFT_type`)
                    VALUES ('$nftname', '$nftprice', '$nftroyalities', '1', '$nftowneradd', '$nftowneradd', '$nftdesc','$Categoryid', '$nftid', '$path', '$date','$nftcollection','$title','$bid_start_date','$bid_expiration_date', '$NFT_type')";

            $data = mysqli_query($link, $sql);
            $sql1 = "INSERT INTO `Nft_activity` ( `Nft_name`, `Nft_image`, `nft_type`, `Date`,`Address`,`Nft_id`,`Nft_price`,`timestamp`, `to_address`) 
                VALUES ( '$nftname', '$path', 'Minted', '$date','nulled','$nftid','$nftprice','" . time() . "', '$nftowneradd')";
                // echo $sql1;
            $datanew = mysqli_query($link, $sql1);

            if ($data) {
                echo json_encode(array("message" => "Item has been created.", "code" => 200, "sql" => $sql1));
            } else {
                echo json_encode(array("message" => "Unable to create item.", "code" => 400, "sql" => $sql));
            }

            $js = array(
                "id" => $nftid,
                "name" => $nftname,
                "NFT_price" => $nftprice,
                "NFT_royalties" => $nftroyalities,
                "created_by" => $nftowneradd,
                "title" => $title,
                "description" => $nftdesc,
                "image" => $actual_link . "/nftiverse/" . $path,
                "time" => $date
            );
            $a = 1;
            if ($a) {
                $pathnew = "./metadata/" . $nftid;
                $fp = fopen($pathnew, 'w');
                fwrite($fp, json_encode($js, JSON_UNESCAPED_SLASHES));
                fclose($fp);
                $ab = 1;
            }
        } else {
            echo json_encode(array("message" => "There was something wrong uploading the file", "code" => 400));
        }
    } else {
        echo json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed.", "code" => 400));
        // echo 'not saved';
    }

}
?>