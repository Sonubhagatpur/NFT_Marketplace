<?php include "header.php";

$NFT_collection = $_GET['nft_collection'];

?>

 <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            
             <section id="section-hero" class="mt-5">
                <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 offset-lg-3 text-center">
                                <h1><?php echo $NFT_collection; ?></h1>
                            </div>
                        </div>
                    </div>
            </section>
            
            <!-- section begin -->
			<section aria-label="section" class="pt-0">
                <div class="container">
                    <div class="row wow fadeIn">
                        
                        <div id="nftContainer" class="row">
                        <?php $uerry = mysqli_query($link, "SELECT * FROM `NFT_info` WHERE `Mintstatus`=1 AND `approved`=1 AND `block`=0 AND `NFT_collection`='$NFT_collection' ORDER BY id DESC");
                                
                                foreach($uerry as $rows){
                                    $address = $rows['NFT_creator_add'];
                                    
                                    $user = mysqli_fetch_assoc(mysqli_query($link, "SELECT `Username`, `Userimage`, `Useremail` `Userportfolio`, `Userbio`, `coverphoto`, `url` FROM `nft_user` WHERE `Useraddress`='$address'"));
                                    
                                    
                                    echo '<div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="nft__item">';
                                    if($rows['NFT_type'] == 1){
                                        $dateTime = new DateTime($rows['bid_expiration_date']);
                                        $year = $dateTime->format('Y');
                                        $month = $dateTime->format('m');
                                        $day = $dateTime->format('d');
                                        $hour = $dateTime->format('H');
                                        $minute = $dateTime->format('i');
                                        $second = $dateTime->format('s');
                                        
                                        echo '<div class="de_countdown" data-year="'.$year.'" data-month="'.$month.'" data-day="'.$day.'" data-hour="'.$hour.'" data-minute="'.$minute.'" data-second="'.$second.'"></div>';
                                    }
                                        echo '

                                <div class="author_list_pp">
                                    <a href="./author.php?address='.$address.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Creator: '.$user['Username'].'">                                    
                                        <img class="lazy" src="./'.$user['Userimage'].'" alt="">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="nft__item_wrap">
                                    
                                    <a href="./details.php?id='.$rows['NFT_id'].'">
                                        <div class="d-placeholder"></div>
                                        <img src="'.$rows['NFT_image'].'" class="nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info">
                                    <a href="./details.php?id='.$rows['NFT_id'].'">
                                        <h4>'.$rows['NFT_name'].'</h4>
                                    </a>
                                    
                                    <div class="nft__item_price">
                                       '.$rows['NFT_price'].' '.$currency.'
                                    </div>
                                   
                                    <div class="nft__item_like">
                                        <i class="fa fa-heart"></i><span>'.$rows['NFT_likes'].'</span>
                                    </div>                            
                                </div> 
                            </div>
                        </div>';
                                }
                                
                                ?>
                        
                        </div>
                                                                 
                    </div>
                </div>
            </section>

        </div>
        <!-- content close -->
        

<?php include "footer.php";?>