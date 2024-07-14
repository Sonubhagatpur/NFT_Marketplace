<?php include "header.php";?>

 <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            
             <section id="section-hero" class="mt-5">
                <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 offset-lg-3 text-center">
                                <h1>Explore</h1>
                            </div>
                        </div>
                    </div>
            </section>
            
            <!-- section begin -->
			<section aria-label="section" class="pt-0">
                <div class="container">
                    <div class="row wow fadeIn">
                        <div class="col-lg-12">

                            <div class="items_filter">
                                <form action="blank.php" class="row form-dark" id="form_quick_search" method="post" name="form_quick_search">
                                    <div class="col text-center">
                                        <input class="form-control" id="name_1" name="name_1" placeholder="Search item here..." type="text"> 
                                        <a href="#" id="btn-submit"><i class="fa fa-search bg-color-secondary"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>

                                <div id="item_category" class="dropdown">
                                    <a href="#" class="btn-selector">All categories</a>
                                    <ul>
                                        <li class="active"><span>All categories</span></li>
                                        <?php
                                        $category = mysqli_query($link, "SELECT * FROM `nft_category` WHERE `status`=0 ORDER BY `category_name` ASC");
                                        foreach($category as $categorys){
                                            $escaped_category_name = htmlspecialchars($categorys['category_name']); 
                                            echo '<li onclick="filterBy(\'' . $escaped_category_name . '\', \'category\')"><span>'.$escaped_category_name.'</span></li>';
                                        }
                                        ?>
                                    </ul>

                                </div>

                                <div id="buy_category" class="dropdown">
                                    <a href="#" class="btn-selector"> 
                                    Collection</a>
                                    <ul>
                                        <?php
                                        $collection_name = mysqli_query($link, "SELECT * FROM `nft_collections` WHERE `collection_status`=0 ORDER BY `collection_name` ASC;");
                                        foreach($collection_name as $collection_names){
                                            $escaped_collection_name = htmlspecialchars($collection_names['collection_name']); 
                                            echo '<li onclick="filterBy(\'' . $escaped_collection_name . '\', \'collection\')"><span>'.$escaped_collection_name.'</span></li>';
                                        }
                                        ?>
                                       
                                    </ul>
                                </div>

                                <!--<div id="items_type" class="dropdown">-->
                                <!--    <a href="#" class="btn-selector">Blockchain</a>-->
                                <!--    <ul>-->
                                <!--        <li class="active"><span>Blokista</span></li>-->
                                <!--    </ul>-->
                                <!--</div>-->

                            </div>
                        </div>      
                        
                        <div id="nftContainer" class="row">
                        <?php $uerry = mysqli_query($link, "SELECT * FROM `NFT_info` WHERE `Mintstatus`=1 AND `approved`=1 AND `block`=0 AND `NFT_resell`=1 ORDER BY id DESC");
                                
                                foreach($uerry as $rows){
                                    $address = $rows['NFT_creator_add'];
                                    
                                    $user = mysqli_fetch_assoc(mysqli_query($link, "SELECT `Username`, `Userimage`, `Useremail` `Userportfolio`, `Userbio`, `coverphoto`, `url` FROM `nft_user` WHERE `Useraddress`='$address'"));
                                    
                                    
                                    echo '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
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
                                        <img class="" src="./'.$user['Userimage'].'" alt="">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="nft__item_wrap">
                                    
                                    <a href="./details.php?id='.$rows['NFT_id'].'">
                                        <div class=""></div>
                                        <img src="'.$rows['NFT_image'].'" class="" alt="">
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
                        
                        
                      

                        <div class="col-md-12 text-center">
                            <a href="#" id="loadmore" class="btn-main">Load more</a>
                        </div>                                              
                    </div>
                </div>
            </section>

        </div>
        <!-- content close -->
        
        <style>
            .countdown-inner {
  display: flex;
  justify-content: space-around;
  font-weight:600;
}
        </style>
        
        <script>
            async function filterBy(selectedValue, type) {

                try {
                    const response = await fetch(`./nft-get-by.php?selectedValue=${selectedValue}&type=${type}`);
                    const data = await response.json();
                    
                    let html = "";
                    data.forEach(nft_data => {
                        let countdownHtml = '';
                        if (nft_data.NFT_type == 1) {
                            // Calculate remaining time in milliseconds
                            const expirationDate = new Date(nft_data.bid_expiration_date).getTime();
                            const now = new Date().getTime();
                            const distance = expirationDate - now;
            
                            // Calculate individual time components
                            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
                            countdownHtml = `
                                <div class="de_countdown" 
                                    data-year="${new Date(nft_data.bid_expiration_date).getFullYear()}" 
                                    data-month="${new Date(nft_data.bid_expiration_date).getMonth() + 1}" 
                                    data-day="${new Date(nft_data.bid_expiration_date).getDate()}" 
                                    data-hour="${new Date(nft_data.bid_expiration_date).getHours()}" 
                                    data-minute="${new Date(nft_data.bid_expiration_date).getMinutes()}" 
                                    data-second="${new Date(nft_data.bid_expiration_date).getSeconds()}">
                                    <div class="countdown-inner">
                                        <div class="countdown-item">${days}d</div>
                                        <div class="countdown-item">${hours}h</div>
                                        <div class="countdown-item">${minutes}m</div>
                                        <div class="countdown-item">${seconds}s</div>
                                    </div>
                                </div>`;
                        }
            
                        html += `
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="nft__item">
                                    ${countdownHtml}
                                    <div class="author_list_pp">
                                        <a href="./author.php?address=${nft_data.NFT_creator_add}" data-bs-toggle="tooltip" data-bs-placement="top" title="Creator: ${nft_data.creator_name}">
                                            <img class="" src="./${nft_data.creator_image}" alt="">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </div>
                                    <div class="nft__item_wrap">
                                        <a href="./details.php?id=${nft_data.NFT_id}">
                                            <div class=""></div>
                                            <img src="${nft_data.NFT_image}" class="" alt="">
                                        </a>
                                    </div>
                                    <div class="nft__item_info">
                                        <a href="./details.php?id=${nft_data.NFT_id}">
                                            <h4>${nft_data.NFT_name}</h4>
                                        </a>
                                        <div class="nft__item_price">
                                            ${nft_data.NFT_price} ${currency}
                                        </div>
                                        <div class="nft__item_like">
                                            <i class="fa fa-heart"></i><span>${nft_data.NFT_likes}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                    });
            
                    // Assuming you have a container with id "nftContainer" where you want to append the generated HTML
                    document.getElementById('nftContainer').innerHTML = html;
            
                    // Function to initialize countdown timers (if any)
                    initializeCountdown();
            
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
            }

function initializeCountdown() {
    // Select all countdown elements and initialize countdown for each
    const countdowns = document.querySelectorAll('.de_countdown');
    countdowns.forEach(countdown => {
        const year = countdown.getAttribute('data-year');
        const month = countdown.getAttribute('data-month') - 1; // Month is zero-indexed in JavaScript dates
        const day = countdown.getAttribute('data-day');
        const hour = countdown.getAttribute('data-hour');
        const minute = countdown.getAttribute('data-minute');
        const second = countdown.getAttribute('data-second');

        // Set the target date for the countdown
        const targetDate = new Date(year, month, day, hour, minute, second);

        // Update the countdown every second
        const timer = setInterval(() => {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                clearInterval(timer);
                countdown.innerHTML = 'EXPIRED';
            } else {
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                countdown.innerHTML = `
                    <div class="countdown-inner">
                        <div class="countdown-item">${days}d</div>
                        <div class="countdown-item">${hours}h</div>
                        <div class="countdown-item">${minutes}m</div>
                        <div class="countdown-item">${seconds}s</div>
                    </div>`;
            }
        }, 1000); // Update every second
    });
}


        </script>

<?php include "footer.php";?>