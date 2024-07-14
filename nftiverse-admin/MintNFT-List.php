 <?php include "header.php";?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <img src="img/nfts.png" width="28"> MINT NFTs List</h4>
                         </div> 
                      </div>  
                    </div>
                     
                     <div class="row mt-4">
                        <div class="col-md-12"> 
                            <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">NFT Name</th>
                                  <th scope="col">Token ID</th>
                                  <th scope="col">Category Name</th>
                                  <th scope="col"> Collection Title </th>
                                   <th scope="col"> Blockchain Network </th>
                                   <th scope="col"> Owner</th>
                                   <th scope="col"> Status</th>
                                   <th scope="col"> Action</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php  $i = 1;
                            
                            $uerry = mysqli_query($link, "SELECT * FROM `NFT_info` WHERE `Mintstatus`=1 ORDER BY approved ASC");
                                
                                foreach($uerry as $rows){
                                    $collName = $rows['NFT_collection'];
                                    $owner = $rows['NFT_creator_add'];
                                    $isblock = $rows['approved']==1 ? "Verified" : "Unverify";
                                    $isStatus = $rows['approved']==0 ? "primary" : "success";
                                    $collection = mysqli_fetch_assoc(mysqli_query($link, "SELECT `collection_image`, `Address`, `collection_name`, `collection_logo`, `collection_description`, `title`, `blockchain_network` FROM `nft_collections` WHERE `collection_name`='$collName'"));
                                    
                                    echo '<tr>
                                              <td>'.$i++.'</td>
                                              <td>'.$rows['NFT_name'].'</td>
                                              <td>'.$rows['NFT_id'].'</td>
                                              <td>'.$rows['NFT_category'].'</td>
                                              <td>'.$collection['title'].'</td>
                                              <td>BLockchain</td>
                                              <td>'.$owner.'</td>
                                              <td> <span class="badge bg-'.$isStatus.'">'.$isblock.'</span> </td>';
                                              if($rows['approved']==1){
                                                  echo '<td><button onclick="NFTApproved('.$rows['NFT_id'].', false)" class="btn btn-danger" >Reject</button></td>';
                                              }else{
                                                  echo '<td><button onclick="NFTApproved('.$rows['NFT_id'].', true)" class="btn btn-success" >Approve</button></td>'; 
                                              }
                                              
                                              echo '
                                            </tr>';
                                
                                }
                                ?>

                              </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
           </section> 
   <!-- End crancy Dashboard -->
        </div>
        
        
    <script type="module">
    import { WagmiCore } from "https://unpkg.com/@web3modal/ethereum@2.6.2";
    const { getContract, writeContract, getAccount, waitForTransaction, fetchBalance, watchAccount } = WagmiCore
    let contractInstance = getContract({ address: contractAddress, abi: contractAbi, chainId: chainId });
    const owner = await contractInstance.read.owner();
    const account = getAccount();
    let isConnected = account.isConnected;
    let selectedAddress = account.address;

    watchAccount(async (account) => {
        selectedAddress = account.address;
        isConnected = account.isConnected;
    });

 
    window.NFTApproved = async function NFTApproved(tokenId, status) {
        if (!isConnected) return Swal.fire("Error", "Please connect your wallet first", "error");
        if (owner != selectedAddress) return Swal.fire("Error", "You are not the owner", "error")
        try {
            document.getElementById("loading").style.display = "block";
            writeContract({
                address: contractAddress,
                abi: contractAbi,
                functionName: 'NFTApproved',
                args: [tokenId, status],
                chainId: chainId
            }).then(async (response) => {
                let hash = await response.hash;
                const data = await waitForTransaction({
                    hash,
                });
                approveStatus(tokenId, status);
                if (data.status == "success") {
                    document.getElementById("loading").style.display = "none";
                    const message = status==true ? "NFT has been approved successfully" : "NFT has been unapproved successfully";
                    Swal.fire(
                        "Transaction Completed!",
                        `Congratulations, ${message}`,
                        "success"
                    ).then((ok) => {
                        window.location.href = './MintNFT-List.php';
                    });
                }

            }).catch((error) => {
                document.getElementById("loading").style.display = "none";
                console.log(error, " error")
            });

        } catch (error) {
            document.getElementById("loading").style.display = "none";
            console.log(error, " error")
        }
    }
    
    async function approveStatus(tokenId, status) { 
        var formdata = new FormData();
        formdata.append("tokenId", tokenId);
        formdata.append("action_type", "isapprove");
        formdata.append("approved", status==true ? 1 : 0);
        var requestOptions = {
            method: "POST",
            body: formdata,
            redirect: "follow",
        };
        fetch("./is_approved.php", requestOptions)
            .then((response) => response.json())
            .then(result=>{
                document.getElementById("loading").style.display = "none";
                console.log(result, " result")
            })
            .catch((error)=>{
                document.getElementById("loading").style.display = "none";
            });
    }



</script>    
        
        
        
        
        
        
        
        
<?php include "footer.php";?>           