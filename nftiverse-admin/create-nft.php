
<?php include "header.php"; ?>

 <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-image"></i> Create New NFTs</h4>
                         </div> 
                      </div>  
                    </div>
                    
                     <div class="row mt-4">
                <div class="col-lg-8">
                    <div class="card p-4"> 
                    <form id="form-create-item" class="form-border" method="post" action="email.php">
                        <div class="field-set">
                            <h5>Upload file</h5>

                            <div class="d-create-file">
                                <p id="file_name">PNG, JPG, GIF, MP4. Max 20mb.</p>
                                <!--<input type="button" id="get_file" class="btn-main" value="Browse">-->
                                <input type="file" id="createinputfile" accept="image/*">
                            </div>


                            <h5 class="mt-3">Select method</h5>
                            
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
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
                            <div class="tab-content" id="pills-tabContent">
                              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                     <!--Fixed price-->
                                    <div id="tab_opt_1">
                                        <h5>Name</h5>
                                        <input type="text" name="name" id="name0" class="form-control"
                                            placeholder="product name">
                                            
                                        <h5 class="mt-2">Price</h5>
                                        <input type="text" name="price" id="price0" class="form-control"
                                            placeholder="enter price for item ">
                                    </div>
                              </div>
                              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                   <!--Timed auction-->
                                    <div id="tab_opt_2">
                                         <h5 class="mb-2">Name</h5>
                                        <input type="text" name="price" id="name1" class="form-control"
                                            placeholder=""> 
                                        
                                        <h5>Minimum bid</h5>
                                        <input type="text" name="item_price_bid" id="item_price_bid"
                                            class="form-control" placeholder="enter minimum bid">


                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Starting date</h5>
                                                <input type="date" name="bid_starting_date" id="bid_starting_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Expiration date</h5>
                                                <input type="date" name="bid_expiration_date" id="bid_expiration_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>
                              </div>
                              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                   <!--Open for bids-->
                                    <div id="tab_opt_3">
                                        <h5>Name</h5>
                                        <input type="text" name="name" id="name2" class="form-control"
                                            placeholder="product name">
                                            
                                        <h5 class="mt-2">Price</h5>
                                        <input type="text" name="price" id="price2" class="form-control"
                                            placeholder="enter price for item ">
                                    </div>
                                  
                              </div>
                            </div>


                            <h5 class="mt-3">Title</h5>
                            <input type="text" name="item_title" id="item_title" class="form-control"
                                placeholder="e.g. 'Crypto Funk">


                            <h5 class="mt-3">Description</h5>
                            <textarea data-autoresize="" name="item_desc" id="Discription" class="form-control"
                                placeholder="e.g. 'This is very limited item'"></textarea>


                            <h5 class="mt-3">Choose collection</h5>
                            <p class="p-info">This is the collection where your item will appear.</p>

                            <div id="item_collection" class="dropdown fullwidth mb20">
                                <select class="form-control collection" id="collection">
                                    <option value="NFTVERSE">NFTVERSE</option>
                                </select>
                            </div>


                            <h5 class="mt-3">Choose Category</h5>
                            <div id="item_collection" class="dropdown fullwidth mb20">
                                <select class="form-control" id="category">
                                    <?php $category = mysqli_query($link, "SELECT * FROM `nft_category` ORDER BY category_name ASC");
                                    foreach ($category as $categorys) {
                                        echo '<option value="' . $categorys['category_name'] . '">' . $categorys['category_name'] . '</option>';
                                    } ?>

                                </select>
                            </div>


                            <h5 class="mt-3">Royalties</h5>
                            <input type="text" name="item_royalties" id="item_royalties" class="form-control" readonly>

                            <div class="spacer-single"></div>

                            <input onclick="mintNFT()" type="button" id="mintButton" class="btn btn-primary mt-3" value="Create Item">
                            <div class="spacer-single"></div>
                        </div>
                    </form>
                     </div>
                </div>
                
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="card p-4"> 
                    <h5>Preview item</h5>
                    <div class="nft__item">
                        <div class="nft__item_wrap">
                            <a href="#">
                                <img src="https://nftiverse.codesnixon.com/img/crs-14.jpg" id="previewImage" class="lazy nft__item_preview" alt="">
                            </a>
                        </div>
                    </div>
                    </div>
                </div>    

            </div>
                </div>
           </section> 

 

</div>
<!-- content close -->
<script>
    document.getElementById('createinputfile').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewImage');
    // const fileNameElement = document.getElementById('file_name');

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            // fileNameElement.innerText = file.name;
        };

        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
        fileNameElement.innerText = 'PNG, JPG, GIF, WEBP or MP4. Max 20mb.';
    }
});

</script>

<script type="module">
    import { WagmiCore } from "https://unpkg.com/@web3modal/ethereum@2.6.2";
    const { getContract, writeContract, getAccount, waitForTransaction, fetchBalance, watchAccount } = WagmiCore
    let contractInstance = getContract({ address: contractAddress, abi: contractAbi, chainId: chainId });
    let mintFees = Number(await contractInstance.read.mintFees());
    let royalty = Number(await contractInstance.read.royalty());
    // document.getElementById("mintFees").innerHTML = mintFees + "%";
    document.getElementById("item_royalties").value = royalty + "%";
    const account = getAccount();
    let isConnected = account.isConnected;
    let selectedAddress = account.address;
    if (isConnected) {
        fetchcollection(selectedAddress);
    }
    watchAccount(async (account) => {
        selectedAddress = account.address;
        isConnected = account.isConnected;
        fetchcollection(selectedAddress);
    });


    function fetchcollection(selectedAddress) {
        var formdata = new FormData();
        formdata.append("owneraddfetch", selectedAddress);
        formdata.append("type", fetch);
        var requestOptions = {
            method: "POST",
            body: formdata,
            redirect: "follow",
        };

        fetch("../fetchcollection.php", requestOptions)
            .then((response) => response.json())
            .then((result) => {
                console.log(result, " resultresult")
                let html = "";
                html += `<option value="NFTVERSE">NFTVERSE</option>`;
                if (result.length) {
                    for (let i = 0; i < result.length; i++) {
                        html += `<option value="${result[i].collection_name}">${result[i].collection_name}</option>`;
                    }
                }

                document.querySelector(".collection").innerHTML = html;
                // document.querySelector('.list').innerHTML = ulHtml;

            });
    }
    
    
    function activeTab(){
       const activeLi = document.querySelector('#slected_method .active');
        if (activeLi) {
            const lis = document.querySelectorAll('#slected_method li');
            const activeIndex = Array.from(lis).indexOf(activeLi);
            return activeIndex;
            console.log('Index of active li:', activeIndex);
        
            const activeText = activeLi.textContent.trim();
            console.log('Text content of active li:', activeText);
        
            if (activeText.includes('Fixed price')) {
                console.log('Fixed price tab is active');
            } else if (activeText.includes('Timed auction')) {
                console.log('Timed auction tab is active');
            } else if (activeText.includes('Open for bids')) {
                console.log('Open for bids tab is active');
            }
        } else {
            console.log('No active li element found');
            return 0;
        }

    }

    window.mintNFT = async function mintNFT() {
        if (!isConnected) return toastMessage("error", "Please Connect your wallet First!.");
        const active_plan = activeTab();
        let nftTokenId = Math.floor(Math.random() * 100000000);
        let name = document.getElementById("name0").value;
        let price = document.getElementById("price0").value;
        let bid_starting_date = document.getElementById("bid_starting_date").value;
        let bid_expiration_date = document.getElementById("bid_expiration_date").value;
        console.log(bid_starting_date, bid_expiration_date, " bid_expiration_datebid_expiration_date")
        
        if(active_plan==1){
          name = document.getElementById("name1").value;
          price = document.getElementById("item_price_bid").value;
          if(bid_starting_date=="") return toastMessage("error", "Please select bid start time.");
          if(bid_expiration_date=="") return toastMessage("error", "Please select bid expire time.");
        }else if(active_plan==2){
          name = document.getElementById("name2").value;
          price = document.getElementById("price2").value;
        }

        const title = document.getElementById("item_title").value;
        const description = document.getElementById("Discription").value;
        const Royality = royalty //document.getElementById("Royality").value;
        const category = document.getElementById("category").value;
        const collection = document.getElementById("collection").value;
        console.log(name, price, description, Royality, category, collection, " collectioncollectioncollection")
        const createfileImage = document.getElementById("createinputfile").files[0];
        if (!createfileImage) return toastMessage("error", "Please choose the NFT image");
        // if (!name) return toastMessage("error", "Please enter the NFT name");
        if (!description) return toastMessage("error", "Please enter the NFT description");
        let origin = window.location.origin;
        let url = window.location.origin + "/nftiverse/metadata/";
        url = url + nftTokenId;
        let balance = await fetchBalance({ address: selectedAddress, chainId: chainId, });
        const formatted = balance.formatted;
        let priceWei = web3.utils.toWei(price.toString(), "ether");
        const gasFees = priceWei * mintFees / 100;
        
        if (Number(balance.value) <= Number(gasFees)) return toastMessage("error", "Insufficient NFT mint and transaction fees!");
        
        console.log(price, " price", formatted, gasFees)

        try {
            document.getElementById("mintButton").disabled = true;
            document.getElementById("loading").style.display = "block";
            const save = await savedata(active_plan,nftTokenId, name, price, Royality, createfileImage, category, collection, description, title,bid_starting_date,bid_expiration_date);
            if (save.code == 200) {
                document.getElementById('mintButton').innerHTML = `<i class="fa fa-cog fa-spin" style="font-size:35px"></i>`;
                writeContract({
                    address: contractAddress,
                    abi: contractAbi,
                    functionName: "MintNFTByOwner",
                    args: [nftTokenId,url,priceWei], //, nftTokenId, price],
                    value: gasFees.toString(),
                    chainId: chainId
                }).then(async (response) => {
                    mintStatus(nftTokenId);
                    let hash = await response.hash;
                    const data = await waitForTransaction({
                        hash,
                    });
                    if (data.status == "success") {
                        document.getElementById("mintButton").disabled = false;
                        document.getElementById('mintButton').innerHTML = "Create Item";
                        document.getElementById("loading").style.display = "none";
                        Swal.fire(
                            "Transaction Completed!",
                            "Congratulations, token Created successfully.",
                            "success"
                        ).then((ok) => {
                            window.location.href = './transfer-nfts.php';
                        })
                    }

                }).catch((error) => {
                    deleteData(nftTokenId);
                    console.log(error, " error")
                    document.getElementById("mintButton").disabled = false;
                    document.getElementById('mintButton').innerHTML = "Create Item";
                    document.getElementById("loading").style.display = "none";
                    return toastMessage("warning", "User Rejected the request.");
                });
            } else {
                document.getElementById("mintButton").disabled = false;
                document.getElementById('mintButton').innerHTML = "Create Item";
                document.getElementById("loading").style.display = "none";
                return toastMessage("warning", save.message);
                console.log(save.message, " errrr")
            }

        } catch (error) {
            console.log(error, " errorerror")
            deleteData(nftTokenId)
            document.getElementById("mintButton").disabled = false;
            document.getElementById('mintButton').innerHTML = "Create Item";
            document.getElementById("loading").style.display = "none";
            console.log(error, " error")
        }
    }

    async function mintStatus(nftTokenId) {
        var formdata = new FormData();
        formdata.append("NFT_id", nftTokenId);
        var requestOptions = {
            method: "POST",
            body: formdata,
            redirect: "follow",
        };
        fetch("../mint_status.php", requestOptions)
            .then((response) => response.text())
            .then()
            .catch();
    }

    function deleteData(nftTokenId) {
        return new Promise((resolve, reject) => {
            try {
                var formdata = new FormData();
                formdata.append('NFT_id', nftTokenId)
                var requestOptions = {
                    method: 'POST',
                    body: formdata,
                    redirect: 'follow'
                };
                fetch("../deleteData.php", requestOptions)
                    .then(response => response.text())
                    .then(result => {
                        resolve(result);
                    })
                    .catch((error) => {
                        reject(error)
                    });

            } catch (error) {
                reject(error)
            }
        })

    }

    function savedata(NFT_type,nftTokenId, name, price, Royality, createfileImage, category, collection, description,title,bid_start_date,bid_expiration_date) {
        return new Promise((resolve, reject) => {
            try {
                var formdata = new FormData();
                formdata.append('NFT_type', NFT_type);
                formdata.append('tokenName', name);
                formdata.append("tokenprice", price);
                formdata.append('tokenroyal', Royality)
                formdata.append('tokenowneradd', selectedAddress)
                formdata.append('tokendesc', description)
                formdata.append('title', title)
                formdata.append('tokenImage', createfileImage)
                formdata.append('category', category)
                formdata.append('collection', collection)
                formdata.append('tokenid', nftTokenId);
                formdata.append('bid_start_date', bid_start_date);
                formdata.append('bid_expiration_date', bid_expiration_date);
                var requestOptions = {
                    method: 'POST',
                    body: formdata,
                    redirect: 'follow'
                };
                fetch("../save.php", requestOptions)
                    .then(response => response.json())
                    .then(result => {
                        resolve(result);
                    })
                    .catch((error) => {
                        reject(error)
                    });

            } catch (error) {
                reject(error)
            }
        })

    }

</script>


<?php include "footer.php"; ?>