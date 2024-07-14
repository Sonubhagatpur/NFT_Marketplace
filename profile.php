<?php include "header.php";?>

    <!-- content begin -->
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
                                                <span id="wallet" class="profile_wallet"></span>
                                                <button id="btn_copy" title="Copy Text">Copy</button>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile_follow de-flex">
                                    <div class="de-flex-col">
                                        <a href="Setting.php" class="btn-main">Edit</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="de_tab tab_simple">
    
                                <ul class="de_nav">
                                    <li class="active"><span> Created NFT </span></li>
                                    <li><span>Collected NFT </span></li>
                                    <li><span> My Favourite  </span></li>
                                </ul>
                                
                                <div class="de_tab_content">
                                    
                                    <div class="tab-1">
                                        <div id="createdItems" class="row">
                                              
                                        </div>
                                    </div>
                                    
                                    <div class="tab-2">
                                        <div id="ownedItems" class="row">
                                        </div>
                                    </div>

                                    <div class="tab-3">
                                        <div id="liked" class="row">
                                           </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
				</div>
            </section>
			
			
        </div>
        <!-- content close -->
        
        <script type="module">
    import { WagmiCore } from "https://unpkg.com/@web3modal/ethereum@2.6.2";
    const { getContract, writeContract, getAccount, watchAccount, waitForTransaction, fetchBalance } = WagmiCore
    let contractInstance = getContract({ address: contractAddress, abi: contractAbi, chainId: chainId });
    const account = getAccount();
    let isConnected = account.isConnected;
    let selectedAddress = account.address;
    if (isConnected) {
        callMethod(selectedAddress)
    }
    watchAccount(async (account) => {
        selectedAddress = account.address;
        isConnected = account.isConnected;
        callMethod(selectedAddress);
    })

    function callMethod(selectedAddress) {
        if (isConnected) {
            myProfile(selectedAddress)
            myItems(selectedAddress)
            createdItems(selectedAddress)
            LikedItems(selectedAddress)
            // myCollection(selectedAddress)
        }else{
          document.querySelector('.profile_wallet').innerHTML = "<p class='text-danger'>Please connect your wallet First!</p>";  
        }

    }

    async function myProfile(selectedAddress) {
         try {
            if (selectedAddress == "" || selectedAddress == undefined) return;
            var formdata = new FormData();
            formdata.append("address", selectedAddress);

            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };

            fetch("./getuserinfo.php", requestOptions)
                .then(response => response.json())
                .then(result => {
                    document.querySelector('.profile_wallet').innerHTML = selectedAddress;
                    document.querySelector('.profile_username').innerHTML = result.Username;
                    document.querySelector('.profile_email').innerHTML = result.Useremail;
                    document.querySelector('.profile_photo').src = result.Userimage;
                })
                .catch(error => console.log('error', error));
        } catch (error) {
            console.log(error, " error")
        }
    }


    /*************************** user like Items functionality **************************/
    async function LikedItems(selectedAddress) {
        var formdata = new FormData();
        formdata.append("address", selectedAddress);
        formdata.append("type", "liked");

        var requestOptions = {
            method: "POST",
            body: formdata,
            redirect: "follow",
        };
        fetch("./itemsdata.php", requestOptions)
            .then((response) => response.json())
            .then(async (createnft) => {
                console.log(createnft, " createnftcreatenft")
                let liked = "";
                for (let i = 0; i < createnft.length; i++) {
                    let love = await getLike('love', createnft[i].NFT_id, selectedAddress);
                    
                    const heart = love != 0 ? "active" : "";
                    liked += `<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <div class="nft__item">
                                            
                                            <div class="author_list_pp">
                                                <a href="author.php?address=${createnft[i].NFT_owner_address}">                                    
                                                    <img class="lazy" src="./${createnft[i].collection_image}" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>
                                            <div class="nft__item_wrap">
                                                <a href="details.php?id=${createnft[i].NFT_id}">
                                                    <img src="./${createnft[i].NFT_image}" class="lazy nft__item_preview" alt="">
                                                </a>
                                            </div>
                                            <div class="nft__item_info">
                                                
                                                <div style="display: flex;justify-content: space-between;">
                                                    <a href="./details.php?id=${createnft[i].NFT_id}">
                                                        <h4>${createnft[i].NFT_name}</h4>
                                                    </a>
                                                    
                                                </div>
                                                
                                                <div class="nft__item_price">
                                                    ${createnft[i].NFT_price} ${currency}
                                                </div>
                                               
                                                <div class="nft__item_like">
                                                    <i onclick="like(${createnft[i].NFT_id}, '${createnft[i].NFT_name}', '${createnft[i].NFT_image}')" id="love${createnft[i].NFT_id}" class="fa fa-heart ${heart}"></i><span id="count${createnft[i].NFT_id}">${createnft[i].NFT_likes}</span>
                                                </div>                            
                                            </div> 
                                            
                                        </div>
                                    </div>`;

                    document.getElementById('liked').innerHTML = liked;
                }

            })
    }

    /*************************** userItems functionality **************************/
    async function myItems(selectedAddress) {
        var formdata = new FormData();
        formdata.append("address", selectedAddress);
        formdata.append("type", "owned");

        var requestOptions = {
            method: "POST",
            body: formdata,
            redirect: "follow",
        };
        fetch("./itemsdata.php", requestOptions)
            .then((response) => response.json())
            .then(async (createnft) => {
                let ownedItems = "";
                for (let i = 0; i < createnft.length; i++) {
                    let love = await getLike('love', createnft[i].NFT_id, selectedAddress);
                    const heart = love != 0 ? "active" : "";
                    ownedItems += `<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <div class="nft__item">
                                            
                                            <div class="author_list_pp">
                                                <a href="author.php?address=${createnft[i].NFT_owner_address}">                                    
                                                    <img class="lazy" src="./${createnft[i].collection_image}" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>
                                            <div class="nft__item_wrap">
                                                <div class="nft__item_extra">
                                                    <div class="nft__item_buttons">
                                                        <button onclick="location.href='details.php?id=${createnft[i].NFT_id}'">Buy Now</button>
                                                        
                                                    </div>
                                                </div>
                                                <a href="details.php?id=${createnft[i].NFT_id}">
                                                    <img src="./${createnft[i].NFT_image}" class="lazy nft__item_preview" alt="">
                                                </a>
                                            </div>
                                            <div class="nft__item_info">
                                                <div style="display: flex;justify-content: space-between;">
                                                    <a href="./details.php?id=${createnft[i].NFT_id}">
                                                        <h4>${createnft[i].NFT_name}</h4>
                                                    </a>`;
                                                    if(createnft[i].NFT_resell==0){
                                                        
                                                    ownedItems += `<a type="submit" style="color: #3396ff;" onclick="location.href='resell.php?id=${createnft[i].NFT_id}'">Sell Now</a>`;
                                                        
                                                    }
                                                
                                                ownedItems +=`</div>
                                                <div class="nft__item_price">
                                                    ${createnft[i].NFT_price} ${currency}
                                                </div>
                                               
                                                <div class="nft__item_like">
                                                    <i onclick="like(${createnft[i].NFT_id}, '${createnft[i].NFT_name}', '${createnft[i].NFT_image}')" id="love${createnft[i].NFT_id}" class="fa fa-heart ${heart}"></i><span id="count${createnft[i].NFT_id}">${createnft[i].NFT_likes}</span>
                                                </div>                            
                                            </div> 
                                        </div>
                                    </div>`;

                    document.getElementById('ownedItems').innerHTML = ownedItems;
                }

            })
    }


    /*************************** userItems functionality **************************/
    async function createdItems(selectedAddress) {
        var formdata = new FormData();
        formdata.append("address", selectedAddress);
        formdata.append("type", "created");

        var requestOptions = {
            method: "POST",
            body: formdata,
            redirect: "follow",
        };
        fetch("./itemsdata.php", requestOptions)
            .then((response) => response.json())
            .then(async (createnft) => {
                let createdItems = "";
                for (let i = 0; i < createnft.length; i++) {
                    let love = await getLike('love', createnft[i].NFT_id, selectedAddress);
                    const heart = love != 0 ? "active" : "";
                    createdItems += `<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="nft__item">
                                                        
                                                        <div class="author_list_pp">
                                                            <a href="author.php?address=${createnft[i].NFT_owner_address}">                                    
                                                                <img class="lazy" src="./${createnft[i].collection_image}" alt="">
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                        </div>
                                                        <div class="nft__item_wrap">
                                                            <div class="nft__item_extra">
                                                                <div class="nft__item_buttons">
                                                                    <button onclick="location.href='details.php?id=${createnft[i].NFT_id}'">Buy Now</button>
                                                                    
                                                                </div>
                                                            </div>
                                                            <a href="details.php?id=${createnft[i].NFT_id}">
                                                                <img src="./${createnft[i].NFT_image}" class="lazy nft__item_preview" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="nft__item_info">
                                                            <a href="./details.php?id=${createnft[i].NFT_id}">
                                                                <h4>${createnft[i].NFT_name}</h4>
                                                            </a>
                                                            <div class="">
                                                                <span></span>
                                                            </div>
                                                            <div class="nft__item_price">
                                                                ${createnft[i].NFT_price} ${currency}
                                                            </div>
                                                           
                                                            <div class="nft__item_like">
                                                                <i onclick="like(${createnft[i].NFT_id}, '${createnft[i].NFT_name}', '${createnft[i].NFT_image}')" id="love${createnft[i].NFT_id}" class="fa fa-heart ${heart}"></i><span id="count${createnft[i].NFT_id}">${createnft[i].NFT_likes}</span>
                                                            </div>                            
                                                        </div> 
                                                    </div>
                                                </div>`;

                    document.getElementById('createdItems').innerHTML = createdItems;
                }

            })
    }


    async function like(NFT_id, NFT_name, NFT_image) {
        let total = document.getElementById(`count${NFT_id}`).innerHTML;
        let element = document.getElementById(`love${NFT_id}`);
        let newClass = "active";
        if (selectedAddress != "") {
            const likeUsers = await getLike('love', NFT_id, selectedAddress);
            if (likeUsers != "" && likeUsers != null) {
                element.classList.remove(newClass)
                document.getElementById(`count${NFT_id}`).innerHTML = Number(total) - 1;
            } else {
                element.classList.add(newClass)
                document.getElementById(`count${NFT_id}`).innerHTML = Number(total) + 1;
            }
            await saveLike('save', NFT_id, NFT_name, selectedAddress, NFT_image);
        }
    }

</script>


<?php include "footer.php";?>