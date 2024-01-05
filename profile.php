<?php include 'header.php'; ?>

<!-- Breadcrumbs Section Start -->
<div class="bithu-breadcrumbs-section" id="home">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="breadcrumbs-area sec-heading">
                    <div class="d-flex align-items-center" style="gap:15px">
                        <div class="user-image">
                            <img src="./assets/images/fav.jpg" class="img-fluid rounded-circle" width="80px"
                                height="80px" alt="">
                        </div>
                        <div class="addressa">
                            <h6>Profile</h6>
                            <span class="walletAddress">0x00000*****000000</span>
                            <div class="d-flex align-items-center mt-1" style="gap:7px">
                                <Button class="btn text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </Button>
                                <Button class="btn text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-share-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5" />
                                    </svg>
                                </Button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Section End -->
<div class="aboutus-body-section pt-50 pb-107">
    <div class="container">

        <div class="aboutus-body-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-area sec-heading">
                        <ul class="nav nav-pills bithu_v1_baner_buttons mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="widhlist_btn hov_shape_show ms-0" id="pills-home-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">
                                    All items
                                    <span class="hov_shape1"><img src="assets/images/icon/hov_shape_L.svg"
                                            alt="" /></span>
                                    <span class="hov_shape2"><img src="assets/images/icon/hov_shape_L.svg"
                                            alt="" /></span>
                                    <span class="square_hov_shape"></span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="widhlist_btn hov_shape_show" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">
                                    Favorites
                                    <span class="hov_shape1"><img src="assets/images/icon/hov_shape_L.svg"
                                            alt="" /></span>
                                    <span class="hov_shape2"><img src="assets/images/icon/hov_shape_L.svg"
                                            alt="" /></span>
                                    <span class="square_hov_shape"></span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="widhlist_btn hov_shape_show" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">
                                    Activies
                                    <span class="hov_shape1"><img src="assets/images/icon/hov_shape_L.svg"
                                            alt="" /></span>
                                    <span class="hov_shape2"><img src="assets/images/icon/hov_shape_L.svg"
                                            alt="" /></span>
                                    <span class="square_hov_shape"></span>
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="container p-0">
                                    <div class="row exploreItems">

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="container p-0">
                                    <div class="row FavorateItems">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <div class="container p-0">
                                    <div class="row activeItem">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    /*************************** userItems functionality **************************/
    async function myItems(selectedAccount) {
        const myItems = await contractInstance.methods.walletOfOwner(selectedAccount).call();
        let exploreItems = "";
        for (let i = 0; i < Number(myItems.length); i++) {
            const tokenId = myItems[i];
            const tokenURI = await contractInstance.methods.tokenURI(tokenId).call();
            const activeId = await contractInstance.methods.NftInfo(tokenId).call();
            const price = web3.utils.fromWei(activeId.price, "ether");
            const likeData = await getLike('get', tokenId);
            const total_like = likeData.total_like;
            const data = await fetch(`https://ipfs.io/ipfs/${tokenURI.substr(7)}`)
            const json = await data.json();
            const likeUsers = await getLike('love', tokenId, selectedAccount);
            let newClass = "";
            if (likeUsers != "" && likeUsers != null) {
                if (selectedAccount == likeUsers.User_address) {
                    newClass = "text-danger";
                }
            }
            const images = `http://ipfs.io/ipfs/${(json.image).substr(7)}`;
            exploreItems += `<div class="col-lg-3 col-sm-6">
                                        <a href="./buy-description.php?id=${tokenId}">
                                            <div class="collections-product-card">
                                                <div class="collections-product-img">
                                                    <span><img src="${images}" alt="img"
                                                            class="img-fluid" /></span>
                                                </div>
                                                <div class="collections-product-info">
                                                    
                                                    <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h6>${json.name}</h6>
                                                            </div>
                                                            </a>
                                                            <div>
                                                                <a href="./sell.php?id=${tokenId}" class="text-white"> Sell Now </a>
                                                            </div>
                                                        </div>
                                                    <p><span>${price} ${currency}</span> <span><i class="fa-regular fa-heart ${newClass}" onclick="like(${tokenId},'${json.name}','${images}')"></i>
                                                    <span id="count${i}">${total_like}</span></span></p>
                                                </div>
                                            </div>
                                        </div>`;
            document.querySelector('.exploreItems').innerHTML = exploreItems;
        }
    }

    /*************************** faverate Items functionality **************************/
    async function faverateItems(selectedAccount) {
        let FavorateItems = "";
        try {
            const likeData = await getLike('faverate', '', selectedAccount);
            for (let i = 0; i < Number(likeData.length); i++) {
                const activeId = await contractInstance.methods.NftInfo(likeData[i].NFT_id).call();
                const price = web3.utils.fromWei(activeId.price, "ether");
                const likes = await getLike('get', likeData[i].NFT_id);
                const total_like = likes.total_like;
                const likeUsers = await getLike('love', likeData[i].NFT_id, selectedAccount);

                FavorateItems += ` <div class="col-lg-3 col-sm-6">
                                              <a href="./buy-description.php?id=${likeData[i].NFT_id}">
                                                <div class="collections-product-card">
                                                    <div class="collections-product-img">
                                                        <span><img src="${likeData[i].NFT_image}" alt="img"
                                                                class="img-fluid" /></span>
                                                    </div>
                                                    <div class="collections-product-info">
                                                        <h6>${likeData[i].NFT_name}</h6>
                                                        </a>
                                                        <p><span>${price} ${currency}</span> <span><i class="fa-regular fa-heart text-danger"></i>
                                                        <span id="count${i}">${total_like}</span></span></p>
                                                    </div>
                                                </div>
                                                
                                            </div>`;
                document.querySelector('.FavorateItems').innerHTML = FavorateItems;
            }

        } catch (error) {
            console.log(error)
        }
    }

    /*************************** userItems functionality **************************/
    async function activeItems(selectedAddress) {
        const myItems = await contractInstance.methods.walletOfOwner(selectedAddress).call();
        let activeItem = "";
        for (let i = 0; i < Number(myItems.length); i++) {
            const tokenId = myItems[i];
            const activeId = await contractInstance.methods.NftInfo(tokenId).call();
            if (activeId.sell == true) {
                const tokenURI = await contractInstance.methods.tokenURI(tokenId).call();
                const price = web3.utils.fromWei(activeId.price, "ether");
                const likeData = await getLike('get', tokenId);
                const total_like = likeData.total_like;
                const likeUsers = await getLike('love', tokenId, selectedAccount);
                let newClass = "";
                if (likeUsers != "" && likeUsers != null) {
                    if (selectedAccount == likeUsers.User_address) {
                        newClass = "text-danger";
                    }
                }
                const data = await fetch(`https://ipfs.io/ipfs/${tokenURI.substr(7)}`)
                const json = await data.json();
                const images = `http://ipfs.io/ipfs/${(json.image).substr(7)}`;
                activeItem += `<div class="col-lg-3 col-sm-6">
                                       <a href="./buy-description.php?id=${tokenId}">
                                            <div class="collections-product-card">
                                                <div class="collections-product-img">
                                                    <span><img src="${images}" alt="img"
                                                            class="img-fluid" /></span>
                                                </div>
                                                <div class="collections-product-info">
                                                    <h6>${json.name}</h6>
                                                    </a>
                                                    <p><span>${price} ${currency}</span> <span><i class="fa-regular fa-heart ${newClass}" onclick="like(${tokenId},'${json.name}','${images}')"></i>
                                                    <span id="count${tokenId}">${total_like}</span></span></p>
                                                </div>
                                            </div>
                                        </div>`;
                document.querySelector('.activeItem').innerHTML = activeItem;
            }
        }
    }

    const Interval = setInterval(main, 1000);

    /*************************** userInfo functionality **************************/

    async function main() {
        let wallet_address = selectedAccount;
        if (wallet_address == "" || wallet_address == null) {
            document.querySelector('.walletAddress').innerHTML = "<p class='text-danger'>Please connect your wallet First</p>";
            return;
        };
        clearInterval(Interval);
        if (wallet_address) { myItems(wallet_address); faverateItems(wallet_address); activeItems(wallet_address); }
        document.querySelector('.walletAddress').innerHTML = wallet_address.substr(0, 10) + "..." + wallet_address.substr(34, 42);
        // var formdata = new FormData();
        // formdata.append("address", wallet_address);
        // formdata.append("type", "userdetails");

        // var requestOptions = {
        //     method: "POST",
        //     body: formdata,
        //     redirect: "follow",
        // };
        // fetch("./api/itemsdata.php", requestOptions)
        //     .then((response) => response.json())
        //     .then((userData) => {
        //     });
    }

    async function like(NFT_id, NFT_name, NFT_image) {
        let total = document.getElementById(`count${NFT_id}`).innerHTML;
        let element = document.getElementById(`love${NFT_id}`);
        let newClass = "text-danger";
        if (selectedAccount != "") {
            const likeUsers = await getLike('love', NFT_id, selectedAccount);
            if (likeUsers != "" && likeUsers != null) {
                element.classList.remove(newClass)
                document.getElementById(`count${NFT_id}`).innerHTML = Number(total) - 1;
            } else {
                element.classList.add(newClass)
                document.getElementById(`count${NFT_id}`).innerHTML = Number(total) + 1;
            }
            await saveLike('save', NFT_id, NFT_name, selectedAccount, NFT_image);
        }
    }


</script>



<?php include 'footer.php'; ?>