<?php include "header.php";


$NFT_id = $_GET['id'];

$nft = mysqli_query($link, "SELECT * FROM `NFT_info` WHERE `Mintstatus`=1 AND `approved`=1 AND `block`=0 AND `NFT_id`='$NFT_id'");

$nfts = mysqli_fetch_assoc($nft);

$ownerAddress = $nfts['NFT_owner_address'];
$creatorAddress = $nfts['NFT_creator_add'];
$NFT_type = $nfts['NFT_type'];
$NFT_collection = $nfts['NFT_collection'];

$owner = mysqli_fetch_assoc(mysqli_query($link, "SELECT `Username`, `Userimage`, `Useremail` `Userportfolio`, `Userbio`, `coverphoto`, `url` FROM `nft_user` WHERE `Useraddress`='$ownerAddress'"));
$creator = mysqli_fetch_assoc(mysqli_query($link, "SELECT `Username`, `Userimage`, `Useremail` `Userportfolio`, `Userbio`, `coverphoto`, `url` FROM `nft_user` WHERE `Useraddress`='$creatorAddress'"));

$collection = mysqli_fetch_assoc(mysqli_query($link, "SELECT `collection_image`, `Address`, `collection_name`, `collection_logo`, `collection_time` FROM `nft_collections` WHERE `collection_name`='$NFT_collection'"));

?>

 <!-- content begin -->
        <div class="no-top" id="content">
            <div id="top"></div>
            

            <section id="nft-item-details" aria-label="section" class="sm-mt-0"> 
                <div class="container">
                    <div class="row g-5">
                        <div class="col-md-5 text-center">
                             <img src="<?php echo $nfts['NFT_image'];  ?>" class="mb-sm-30 w-100" alt="">
                        </div>
                        <div class="col-md-7">
                            <div class="item_info">
                                <?php if($NFT_type==1){
                                    $dateTime = new DateTime($nfts['bid_expiration_date']);
                                    $year = $dateTime->format('Y');
                                    $month = $dateTime->format('m');
                                    $day = $dateTime->format('d');
                                    $hour = $dateTime->format('H');
                                    $minute = $dateTime->format('i');
                                    $second = $dateTime->format('s');
                                    echo 'Auctions ends in <div class="de_countdown" data-year="'.$year.'" data-month="'.$month.'" data-day="'.$day.'" data-hour="'.$hour.'" data-minute="'.$minute.'" data-second="'.$second.'"></div>';
                                }
                                ?>
                                
                                <h2><?php echo $nfts['NFT_name']. ' #' .$nfts['NFT_id']  ?></h2>
                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i><?php echo $nfts['NFT_category'];  ?></div>
                                    
                                    <div class="item_info_like"><i class="fa fa-heart"></i><?php echo $nfts['NFT_likes'];  ?></div>
                                </div>
                                <p><?php echo $nfts['NFT_discription'];  ?></p>

                                <div class="d-flex flex-row">
                                    <div class="mr40">
                                        <h6>Creator</h6>
                                        <div class="item_author">                                    
                                            <div class="author_list_pp">
                                                <a href="./author.php?address=<?php echo $creatorAddress;  ?>">
                                                    <img class="lazy" src="<?php echo $creator['Userimage'];  ?>" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="author_list_info">
                                                <a href="./author.php?address=<?php echo $creatorAddress;  ?>"><?php echo $creator['Username'];  ?></a>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="mr40">
                                        <h6>Collection</h6>
                                        <div class="item_author">                                    
                                            <div class="author_list_pp">
                                                <a href="">
                                                    <img class="lazy" src="<?php echo $collection['collection_image'];  ?>" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="author_list_info">
                                                <a href=""><?php echo $NFT_collection;  ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h6>Owner</h6>
                                        <div class="item_author">                                    
                                            <div class="author_list_pp">
                                                <a href="./author.php?address=<?php echo $ownerAddress;  ?>">
                                                    <img class="lazy" src="<?php echo $owner['Userimage'];  ?>" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="author_list_info">
                                                <a href="./author.php?address=<?php echo $ownerAddress;  ?>"><?php echo $owner['Username'];  ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="spacer-40"></div>

                                <div class="de_tab tab_simple">
    
                                <ul class="de_nav">
                                    <li class="active" ><span > Blockchain Info</span></li>
                                    <?php if($NFT_type !=0){
                                    echo '<li><span>Bids</span></li>'; 
                                    } ?>
                                </ul>
                                 
                                <div class="de_tab_content">

                                    <div class="tab-1">
                                        <div class="table-responsive">
                                                 <table class="table table-hover table-bordered">
                                                    <tbody> 
                                                        <tr>
                                                            <th>Contract</th>
                                                            <td><a target="_blank" href="https://testnet-explorer.bccscan.com/address/0xe5B71E0444F71d1b626dE83D062EE91F259E3f27/transactions">0xe5B...E3f27</a></td> 
                                                        </tr>
                                                        <tr>
                                                            <th>Token ID</th>
                                                            <td><?php echo $NFT_id; ?></td> 
                                                        </tr>
                                                        <tr>
                                                            <th>Token Standard</th>
                                                            <td>BCC721</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Blockchain Network</th>
                                                            <td>Blokista</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>

                                    <div class="tab-2">
                                        <?php
                                        $bid = mysqli_query($link, "SELECT * FROM `NFT_onlybid` WHERE `NFT_id`='$NFT_id' ORDER BY id DESC;");
                                        foreach($bid as $bids){
                                            $ownerAddress1 = $bids['NFT_bidder_address'];
                                            $bidder = mysqli_fetch_assoc(mysqli_query($link, "SELECT `Username`, `Userimage`, `Useremail` `Userportfolio`, `Userbio`, `coverphoto`, `url` FROM `nft_user` WHERE `Useraddress`='$ownerAddress1'"));
                                            
                                            echo '<div class="p_list">
                                                    <div class="p_list_pp">
                                                        <a href="author.php?address='.$ownerAddress1.'">
                                                            <img class="lazy" src="'.$bidder['Userimage'].'" alt="">
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                    </div>                                    
                                                    <div class="p_list_info">
                                                        Bid accepted <b>'.$bids['NFT_bid_amount'].' '.$currency.'</b>
                                                        <span>by <b>'.$bidder['Username'].'</b> at '.date('d/M/Y h:i:s').'</span>
                                                    </div>
                                                </div>';
                                        }
                                        
                                        ?>
                                       
                                        
                                    </div>
                                    
                                    
                                </div>

                                <div class="spacer-10"></div>

                                <h6>Price</h6>
                                <div class="nft-item-price"><img src="img/ethereum.svg" alt=""><span><?php echo $nfts['NFT_price']." ".$currency;  ?></span></div>

                                <!-- Button trigger modal -->
                                 <?php if($NFT_type==1){
                                     echo '<button class="btn-main btn-lg" data-bs-toggle="modal" data-bs-target="#place_a_bid" style="cursor: pointer;">
                                  Place a Bid
                                </button>';
                                 }else if($NFT_type==2){
                                     echo '<button class="btn-main btn-lg" data-bs-toggle="modal" data-bs-target="#place_a_bid" style="cursor: pointer;">
                                  Place a Bid
                                </button>';
                                 }else{
                                     echo '<button onclick="buyNFT()" class="btn-main btn-lg" style="cursor: pointer;">
                                  Buy Now
                                </button>';
                                 }
                                 ?>
                                
                                
                            </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                 <div class="container mt-5">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item mt-2">
                         
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    NFT Activity                        </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr.NO</th>
                                                    <th>Event</th>
                                                    <th>Price</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                $activity = mysqli_query($link, "SELECT * FROM `Nft_activity` WHERE `Nft_id`='$NFT_id' ORDER BY `id` DESC");
                                                foreach($activity as $activitys){
                                                    echo '<tr>
                                                    <td>'.$i++.'</td>
                                                    <td>'.$activitys['nft_type'].'</td>
                                                    <td>'.$activitys['Nft_price'].' '.$currency.'</td>
                                                    <td>'.$activitys['Address'].'</td>
                                                    <td>'.$activitys['to_address'].'</td>
                                                    <td>'.date('d-M-Y h:i:s' , $activitys['timestamp']).'</td>
                                                </tr> ';
                                                }
                                                
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
			
			
        </div>
        <!-- content close -->


    </div>
        <!-- content close -->
        
        
        <!-- place a bid -->
        <div class="modal fade" id="place_a_bid" tabindex="-1" aria-labelledby="place_a_bid" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered de-modal">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-body">
                <div class="p-3 form-border">
                    <h3>Place a Bid</h3>
                    You are about to place a bid for <b><?php echo $nfts['NFT_name']. ' #' .$nfts['NFT_id'];  ?></b> from <b><?php echo $owner['Username'];  ?></b>
                    <div class="spacer-single"></div>
                    <h6>Your bid <?php echo $currency;  ?></h6>
                    <input type="number" min='0' onkeyup="payAmount()" onchange="payAmount()" name="bid_value" id="bid_value" class="form-control" placeholder="Enter bid">
                    
                    <div class="spacer-single"></div>
                    
                    <div class="de-flex">
                        <div>Your balance</div>
                        <div><b class="userBalance">0.00 BCC</b></div>
                    </div>
                    <div class="de-flex">
                        <div>Service fee</div>
                        <div><b class="ServiceFees">0%</b></div>
                    </div>
                    <div class="de-flex">
                        <div>You will pay</div>
                        <div><b class="Youwillpay">0.00 BCC</b></div>
                    </div>
                    <div class="spacer-single"></div>
                    <a onclick="submitBid()" style="cursor: pointer;" class="btn-main btn-fullwidth">Place a bid</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
        
<script type="module">
    import { WagmiCore } from "https://unpkg.com/@web3modal/ethereum@2.6.2";
    const { getContract, writeContract, getAccount, waitForTransaction, fetchBalance, watchAccount } = WagmiCore
    let contractInstance = getContract({ address: contractAddress, abi: contractAbi, chainId: chainId });
    let sellRate = Number(await contractInstance.read.sellRate());
    // document.getElementById("mintFees").innerHTML = mintFees / 10 ** 18 + " " + currency;
    const account = getAccount();
    let isConnected = account.isConnected;
    let selectedAddress = account.address;
    if(isConnected) showBalance();

    watchAccount(async (account) => {
        selectedAddress = account.address;
        isConnected = account.isConnected;
        if(isConnected)  showBalance();
    });
    
    async function showBalance(){
        const balance = await fetchBalance({address:selectedAddress, chainId});
        document.querySelector('.userBalance').innerHTML = getMe2DecimalPointsWithCommas(balance.formatted)+" "+currency;
        document.querySelector('.ServiceFees').innerHTML = sellRate+"%";
        document.querySelector('.Youwillpay').innerHTML = "<?php echo $nfts['NFT_price'].' '.$currency ?>";
    }
    
    window.payAmount = function payAmount(){
        let bid_value = document.getElementById("bid_value").value;
        document.querySelector('.Youwillpay').innerHTML = bid_value+' '+currency;
    }

    window.buyNFT = async function buyNFT() {
        let nftTokenId = "<?php echo $NFT_id ?>";

        if (!isConnected) return Swal.fire("Error", "Please connect your wallet first", "error")
        const activeId = await contractInstance.read.NftInfo([nftTokenId]);
        const saleStatus = activeId[2];
        if (!saleStatus) return Swal.fire("Warning", "This item is not for sale.", "warning");
        let owner = await contractInstance.read.ownerOf([nftTokenId.toString()]);
        if (owner.toLowerCase() === selectedAddress.toLowerCase()) return Swal.fire("Error", "You can't buy your NFT", "error");
        let balance = await fetchBalance({ address: selectedAddress, chainId: chainId, });
        const formatted = balance.formatted;
        const nftValueWei = activeId[1];
        
        try {
            if (Number(balance.value) >= Number(nftValueWei));
            document.getElementById("loading").style.display = "block";
                writeContract({
                    address: contractAddress,
                    abi: contractAbi,
                    functionName: 'buyNFT',
                    args: [nftTokenId.toString()],
                    chainId: chainId,
                    value:nftValueWei
                }).then(async (response) => {
                    let hash = await response.hash;
                    const data = await waitForTransaction({
                        hash,
                    });
                    if (data.status == "success") {
                        dataUpdate(selectedAddress, nftTokenId);
                        document.getElementById("loading").style.display = "none";
                    }

                }).catch((error) => {
                    console.log(error, " error")
                    document.getElementById("loading").style.display = "none";
                    Swal.fire("Warning!", "User Rejected the request.", "warning");
                });

        
        } catch (error) {
            document.getElementById("loading").style.display = "none";
            console.log(error, " error")
        }
    }

    function dataUpdate(buyerAddress, id) {
        var formdata = new FormData();
        formdata.append("buyerAddress", buyerAddress);
        formdata.append("tokenid", id);

        var requestOptions = {
            method: "POST",
            body: formdata,
            redirect: "follow",
        };

        fetch("./bought.php", requestOptions)
            .then((response) => response.text())
            .then((result) => {
                document.getElementById("loading").style.display = "none";
                Swal.fire({
                    icon: "success",
                    title: "Great...",
                    text: "Congratulation! You Bought This NFT",
                }).then((ok) => {
                    location.href = "./profile.php";
                });
            })
            .catch((error) => console.log("error", error));
    }
    
    
    // ---------------------------------
    window.submitBid = async function submitBid() {
        let bid_value = document.getElementById("bid_value").value;
        let nftTokenId = "<?php echo $NFT_id ?>";

        if (!isConnected) return Swal.fire("Error", "Please connect your wallet first", "error")
        if (bid_value=="" || isNaN(bid_value)) return Swal.fire("Error", "Please enter bidding amount", "error")
        const activeId = await contractInstance.read.NftInfo([nftTokenId]);
        const saleStatus = activeId[2];
        if (!saleStatus) return Swal.fire("Warning", "This item is not for sale.", "warning");
        let owner = await contractInstance.read.ownerOf([nftTokenId.toString()]);
        // if (owner.toLowerCase() === selectedAddress.toLowerCase()) return Swal.fire("Error", "You can't buy your NFT", "error");
        let balance = await fetchBalance({ address: selectedAddress, chainId: chainId, });
        const formatted = balance.formatted;
        const nftValueWei = activeId[1];
            
            
            var formdata = new FormData();
            formdata.append("tokenid", nftTokenId);
            formdata.append("bid", bid_value);
            formdata.append("bidder_Address", selectedAddress);
            

            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };

            fetch("./saveonlybid.php", requestOptions)
                .then((response) => response.json())
                .then((result) => {
                    console.log(result, " resultresult")

                    if(result.code==201 || result.code==200){
                        Swal.fire({
                        icon: 'success',
                        title: 'God Job!',
                        text: `${result.message}`
                    }).then((ok)=>{
                        window.location.reload();
                    })
                    }else{
                        Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: `${result.message}`
                    })
                    }
                    
                }).catch((error) => {
                    console.log(err, " errerr")
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `${error}`
                    })
                })

    }

</script>
            
            

<?php include "footer.php";?>   