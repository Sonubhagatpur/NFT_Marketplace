<?php include "header.php";


$id = $_GET['id'];
$Newest = mysqli_query($link, "SELECT * FROM `NFT_info` WHERE `Mintstatus`=1 AND `block`=0 AND `NFT_id`='$id'");
$rows = mysqli_fetch_assoc($Newest);
$createrAdd = $rows['NFT_creator_add'];
$ownerAdd = $rows['NFT_owner_address'];
$collectionId = $rows['NFT_collection'];
$creater = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `nft_user` WHERE `Useraddress`='$createrAdd'"));
$owner = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `nft_user` WHERE `Useraddress`='$ownerAdd'"));
$collections = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `nft_collections` WHERE `id`='$collectionId'"));

?>

 <!-- content begin -->
        <div class="no-top" id="content">
            <div id="top"></div>
            

            <section id="nft-item-details" aria-label="section" class="sm-mt-0">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-md-5 text-center">
                             <img src="<?php echo $rows['NFT_image'] ?>" class="mb-sm-30 w-100" alt="">
                        </div>
                        <div class="col-md-7">
                            <div class="item_info">
                               
                                <h2><?php echo $rows['NFT_name'].' #' .$rows['NFT_id'] ?></h2>
                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i><?php echo $rows['NFT_category'] ?></div>
                                    
                                    <div class="item_info_like"><i class="fa fa-heart"></i><?php echo $rows['NFT_likes'] ?></div>
                                </div>
                                <p><?php echo $rows['NFT_discription'] ?></p>

                              
                                 <ul class="nav nav-pills mb-3" id="slected_method" role="tablist" >
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><span><i class="fa fa-tag"></i> Fixed price</span></button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><span><i class="fa fa-hourglass-1"></i> Timed auction</span></button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><span><i class="fa fa-users"></i> Open for bids</span></button>
                                  </li>
                                </ul>
                                
                                <h6 class="mt-3">Price</h6>
                                <input type="number" min='0' id="dollerValue" class="form-control" placeholder="Price">
                                
                                <div class="row" id="auction-dates" style="display: none;">
                                            <div class="col-md-6">
                                            <h5>Starting date</h5>
                                            <input type="date" name="bid_starting_date" id="bid_starting_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Expiration date</h5>
                                            <input type="date" name="bid_expiration_date" id="bid_expiration_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        </div>
                                

                                <!-- Button trigger modal -->
                                <button onclick="resellNFT()" id="mintButton" class="btn-main btn-lg mt-3" >
                                 SELL NOW
                                </button>
                               
                          
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </section>
			
			
        </div>
        <!-- content close -->


    </div>
        <!-- content close -->
        
    <script type="module">
    import { WagmiCore } from "https://unpkg.com/@web3modal/ethereum@2.6.2";
    const { getContract, writeContract, getAccount, watchAccount, waitForTransaction, fetchBalance } = WagmiCore
    let contractInstance = getContract({ address: contractAddress, abi: contractAbi, chainId: chainId });
    const account = getAccount();
    let isConnected = account.isConnected;
    let selectedAddress = account.address;
    watchAccount(async (account) => {
        selectedAddress = account.address;
        isConnected = account.isConnected;
    })
    
    document.addEventListener("DOMContentLoaded", function() {
    const tabButtons = document.querySelectorAll('.nav-link');

    tabButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const auctionDates = document.getElementById('auction-dates');

            if (button.id === 'pills-profile-tab') {
                auctionDates.style.display = 'block'; 
            } else {
                auctionDates.style.display = 'none';
            }
        });
    });
});



    function activeTab(){
      const listItems = document.querySelectorAll('#slected_method li');

    let activeIndex = 0; // Initialize index with -1 (not found) 
    
    listItems.forEach((li, index) => {
        if (li.querySelector('.nav-link').classList.contains('active')) {
            activeIndex = index; // Set activeIndex to the current index if it's active
        }
    });
    
    return activeIndex;

    }


    window.resellNFT = async function resellNFT() {
            if (!isConnected) return toastMessage("error", "Please connect your wallet First");
            const value = document.getElementById('dollerValue').value;
            let bid_starting_date = document.getElementById("bid_starting_date").value;
            let bid_expiration_date = document.getElementById("bid_expiration_date").value;
            console.log(bid_starting_date, bid_expiration_date, " bid_expiration_datebid_expiration_date")
        
            if(value < 0 || isNaN(value) || value=="") return Swal.fire("Error", "Invalid amount.", "error");
            const active_plan = activeTab();
            if(active_plan==1){
              if(bid_starting_date=="") return toastMessage("error", "Please select bid start time.");
              if(bid_expiration_date=="") return toastMessage("error", "Please select bid expire time.");
            }
            const weiValue = web3.utils.toWei(value.toString(), "ether");
            const id = "<?php echo $id; ?>";
            const owner = await contractInstance.read.ownerOf([id]);
            
            if (owner.toLowerCase() != selectedAddress.toLowerCase()) return toastMessage("error", "You are not the owner of this NFT");
            document.getElementById("mintButton").disabled = true;
            document.getElementById('mintButton').innerHTML = `<i class="fa fa-cog fa-spin" style="font-size:35px"></i>`;

        try {
            document.getElementById("loading").style.display = "block";
            writeContract({
                address: contractAddress,
                abi: contractAbi,
                functionName: 'reSellNFT',
                args: [id.toString(), BigInt(weiValue)],
                chainId: chainId
            }).then(async (response) => {
                let hash = await response.hash;
                const data = await waitForTransaction({
                    hash,
                });
                if (data.status == "success") {
                var formdata = new FormData();
                formdata.append("NFT_id", id);
                formdata.append("price", value);
                formdata.append("bid_starting_date", bid_starting_date);
                formdata.append("bid_expiration_date", bid_expiration_date);
                formdata.append("type", active_plan);
                var requestOptions = {
                    method: "POST",
                    body: formdata,
                    redirect: "follow",
                };
                fetch("./resellapi.php", requestOptions)
                    .then((response) => response.json())
                    .then(result=>{
                    document.getElementById("mintButton").disabled = false;
                    document.getElementById('mintButton').innerHTML = "SELL NOW";
                    document.getElementById("loading").style.display = "none";
                    Swal.fire(
                        "Transaction Completed!",
                        "Congratulations, Item price updated and sale started.",
                        "success"
                    ).then((ok) => {
                        window.location.href = './profile.php';
                    })
                        
                    })
                    .catch((error)=>{
                         document.getElementById("mintButton").disabled = false;
                         document.getElementById('mintButton').innerHTML = "SELL NOW";
                        document.getElementById("loading").style.display = "none";
                        console.log(error, "cat error")
                    });
                }

            }).catch((error) => {
                console.log(error, " error")
                document.getElementById("mintButton").disabled = false;
                document.getElementById('mintButton').innerHTML = "SELL NOW";
                document.getElementById("loading").style.display = "none";
                Swal.fire("Warning!", "User Rejected the request.", "warning");
            });
        } catch (error) {
            console.log(error, " error");
            document.getElementById("loading").style.display = "none";
        }
    }
    


</script>
            
            

<?php include "footer.php";?>   