<?php include "header.php";?>


<?php

$userAddress = $_GET['address'];

$query = "SELECT n.NFT_name, n.NFT_likes, n.NFT_price, n.NFT_royalties, n.NFT_resell, n.NFT_owner_address, n.NFT_creator_add, n.NFT_discription, n.NFT_category, n.NFT_type, n.NFT_id, n.NFT_image, n.NFT_time, n.NFT_collection, n.title, n.bid_start_date, n.bid_expiration_date, c.collection_image, c.collection_name, c.collection_logo,  c.collection_description, c.blockchain_network, c.url, c.category AS collection_category FROM NFT_info n JOIN nft_collections c ON n.NFT_collection = c.collection_name WHERE n.NFT_owner_address='$userAddress' AND Mintstatus='1' ORDER BY n.ID DESC;";


$user = mysqli_query($link, $query);


?>

<div class="no-bottom" id="content">
            <div id="top"></div>
            <section aria-label="section">
                <div class="container">
					<div class="row">
					    <div class="col-md-12">
                           <div class="d_profile de-flex">
                                <div class="de-flex-col">
                                    <div class="profile_avatar">
                                        <img class="profile_photo" src="images/demouser.jpeg" alt="">
                                        <i class="fa fa-check"></i>
                                        <div class="profile_name">
                                            <h4>
                                                <span class="profile_username"></span>                                               
                                                <span class="profile_email"></span>
                                                <span id="wallet" class="profile_wallet"><?php echo $userAddress; ?></span>
                                                <button id="btn_copy" title="Copy Text">Copy</button>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="de_tab tab_simple">
    
                                <ul class="de_nav">
                                    <li class="active"><span> Items </span></li>
                                    <!--<li><span>Collected NFT </span></li>-->
                                    <!--<li><span> My Favourite  </span></li>-->
                                </ul>
                                
                                <div class="de_tab_content">
                                    
                                    
                                    <div class="tab-1">
                                        <div id="createdItems" class="row">
                                                <!-- nft item begin -->
                                                
                                    <?php
                                    foreach($user as $users){
                                        echo '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="nft__item">
                                                        
                                                        
                                                        <div class="nft__item_wrap">
                                                            <div class="nft__item_extra">
                                                                <div class="nft__item_buttons">
                                                                    <a href="details.php?id='.$users['NFT_id'].'">Buy Now</a>
                                                                    
                                                                </div>
                                                            </div>
                                                            <a href="details.php?id='.$users['NFT_id'].'">
                                                                <img src="./'.$users['NFT_image'].'" class="lazy nft__item_preview" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="nft__item_info">
                                                            <a href="details.php?id='.$users['NFT_id'].'">
                                                                <h4>'.$users['NFT_name'].'</h4>
                                                            </a>
                                                            <div class="nft__item_click">
                                                                <span></span>
                                                            </div>
                                                            <div class="nft__item_price">
                                                                '.$users['NFT_price'].' '.$currency.'<span></span>
                                                            </div>
                                                           
                                                            <div class="nft__item_like">
                                                                <i class="fa fa-heart active"></i><span>'.$users['NFT_likes'].'</span>
                                                            </div>                            
                                                        </div> 
                                                    </div>
                                                </div> ';
                                    }
                                    
                                    ?>
                                                
                                                   
                                                
                                                
                                                
                                                 <!--nft item begin -->
                                                <!--<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">-->
                                                <!--    <div class="nft__item">-->
                                                <!--        <div class="author_list_pp">-->
                                                <!--            <a href="author.html">                                    -->
                                                <!--                <img class="lazy" src="img/author-1.jpg" alt="">-->
                                                <!--                <i class="fa fa-check"></i>-->
                                                <!--            </a>-->
                                                <!--        </div>-->
                                                <!--        <div class="nft__item_wrap">-->
                                                <!--            <div class="nft__item_extra">-->
                                                <!--                <div class="nft__item_buttons">-->
                                                <!--                    <button onclick="location.href='details.php'">Buy Now</button>-->
                                                                    
                                                <!--                </div>-->
                                                <!--            </div>-->
                                                <!--            <a href="details.php">-->
                                                <!--                <img src="img/porto-2.jpg" class="lazy nft__item_preview" alt="">-->
                                                <!--            </a>-->
                                                <!--        </div>-->
                                                <!--        <div class="nft__item_info">-->
                                                <!--            <a href="details.php">-->
                                                <!--                <h4>The Animals</h4>-->
                                                <!--            </a>-->
                                                <!--            <div class="nft__item_click">-->
                                                <!--                <span></span>-->
                                                <!--            </div>-->
                                                <!--            <div class="nft__item_price">-->
                                                <!--                0.06 ETH<span>1/22</span>-->
                                                <!--            </div>-->
                                                           
                                                <!--            <div class="nft__item_like">-->
                                                <!--                <i class="fa fa-heart"></i><span>80</span>-->
                                                <!--            </div>                                 -->
                                                <!--        </div> -->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                 <!--nft item begin -->
                                                <!--<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">-->
                                                <!--    <div class="nft__item">-->
                                                        
                                                <!--        <div class="author_list_pp">-->
                                                <!--            <a href="author.html">                                    -->
                                                <!--                <img class="lazy" src="img/author-1.jpg" alt="">-->
                                                <!--                <i class="fa fa-check"></i>-->
                                                <!--            </a>-->
                                                <!--        </div>-->
                                                <!--        <div class="nft__item_wrap">-->
                                                <!--            <div class="nft__item_extra">-->
                                                <!--                <div class="nft__item_buttons">-->
                                                <!--                    <button onclick="location.href='details.php'">Buy Now</button>-->
                                                                   
                                                <!--                </div>-->
                                                <!--            </div>-->
                                                <!--            <a href="details.php">-->
                                                <!--                <img src="img/porto-3.jpg" class="lazy nft__item_preview" alt="">-->
                                                <!--            </a>-->
                                                <!--        </div>-->
                                                <!--        <div class="nft__item_info">-->
                                                <!--            <a href="details.php">-->
                                                <!--                <h4>Three Donuts</h4>-->
                                                <!--            </a>-->
                                                <!--            <div class="nft__item_click">-->
                                                <!--                <span></span>-->
                                                <!--            </div>-->
                                                <!--            <div class="nft__item_price">-->
                                                <!--                0.05 ETH<span>1/11</span>-->
                                                <!--            </div>-->
                                                           
                                                <!--            <div class="nft__item_like">-->
                                                <!--                <i class="fa fa-heart"></i><span>97</span>-->
                                                <!--            </div>                                 -->
                                                <!--        </div> -->
                                                <!--    </div>-->
                                                <!--</div>-->
                                    <!--            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">-->
                                    <!--                <div class="nft__item">-->
                                    <!--                    <div class="author_list_pp">-->
                                    <!--                        <a href="author.html">                                    -->
                                    <!--                            <img class="lazy" src="img/author-1.jpg" alt="">-->
                                    <!--                            <i class="fa fa-check"></i>-->
                                    <!--                        </a>-->
                                    <!--                    </div>-->
                                    <!--                    <div class="nft__item_wrap">-->
                                    <!--                        <div class="nft__item_extra">-->
                                    <!--                            <div class="nft__item_buttons">-->
                                    <!--                                <button onclick="location.href='details.php'">Buy Now</button>-->
                                                                    
                                    <!--                            </div>-->
                                    <!--                        </div>-->
                                    <!--                        <a href="details.php">-->
                                    <!--                            <img src="img/porto-4.jpg" class="lazy nft__item_preview" alt="">-->
                                    <!--                        </a>-->
                                    <!--                    </div>-->
                                    <!--                    <div class="nft__item_info">-->
                                    <!--                        <a href="details.php">-->
                                    <!--                            <h4>Graffiti Colors</h4>-->
                                    <!--                        </a>-->
                                    <!--                        <div class="nft__item_click">-->
                                    <!--    <span></span>-->
                                    <!--</div>-->
                                    <!--<div class="nft__item_price">-->
                                    <!--                            0.02 ETH<span>1/15</span>-->
                                    <!--                        </div>-->
                                                           
                                    <!--                        <div class="nft__item_like">-->
                                    <!--                            <i class="fa fa-heart"></i><span>73</span>-->
                                    <!--                        </div>                                 -->
                                    <!--                    </div> -->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                        </div>
                                    </div>
                                  
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
				</div>
            </section>
			
			
        </div>
        
        <?php include "footer.php";?>