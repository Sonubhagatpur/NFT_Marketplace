<?php include 'header.php';
$id = $_GET['id'];
?>

<!-- Breadcrumbs Section Start -->
<div class="bithu-breadcrumbs-section" id="home">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="breadcrumbs-area sec-heading">
                    <div class="sub-inner mb-15">
                        <a class="breadcrumbs-link" href="index.html">Home</a><span class="sub-title"> Buy
                            Now</span>
                        <img class="heading-left-image" src="assets/images/icon/home-shape.png" alt="Steps-Image" />
                    </div>
                    <h2><a class="title" href="#">Buy Now</a></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Section End -->
<div class="aboutus-body-section pt-50 pb-107">
    <div class="container buyDescription">
    </div>
</div>

<script>
    $(document).ready(function () {
        myItems();
    });

    async function myItems() {
        const id = "<?php echo $id; ?>";
        const tokenURI = await contractInstance.methods.tokenURI(id).call();
        const sellRate = await contractInstance.methods.sellRate().call();
        const activeId = await contractInstance.methods.NftInfo(id).call();
        const price = web3.utils.fromWei(activeId.price, "ether");
        const data = await fetch(`https://ipfs.io/ipfs/${tokenURI.substr(7)}`)
        const json = await data.json();
        const images = `http://ipfs.io/ipfs/${(json.image).substr(7)}`;
        let exploreItems = `        <div class="aboutus-body-content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="collections-product-img">
                        <img src="${images}" alt="img" class="img-fluid" />
                    </div>
                </div>
                <div class="col-lg-6 offset-md-2">
                    <div class="breadcrumbs-area sec-heading">
                        <div class="nft-name d-flex align-items-center justify-content-between mb-3">
                            <h6 class="fw-normal">NFT Name: ${json.name}</h6>
                            <h6>Price: ${price} ${currency} </h6>
                        </div>

                        <div class="nft-name d-flex align-items-center justify-content-between mb-3">
                            <h6 class="fw-normal">Platform</h6>
                            <h6>Fees: ${sellRate}% </h6>
                        </div>
                        <div class="disName py-4">
                            <p><b>Description:</b> ${json.description}</p>
                        </div>
                        <div class="bithu_v1_baner_buttons">
                            <button onclick="buyNFT('${activeId.price}')" class="mint_btn hov_shape_show">
                                Buy now
                                <span class="hov_shape1"><img src="assets/images/icon/hov_shape_L_dark.svg"
                                        alt=""></span>
                                <span class="hov_shape2"><img src="assets/images/icon/hov_shape_L_dark.svg"
                                        alt=""></span>
                                <span class="square_hov_shape_dark"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
        document.querySelector('.buyDescription').innerHTML = exploreItems;
    }

    const buyNFT = async (amount) => {
        try {
            const web33 = new Web3(provider);
            const contract = new web33.eth.Contract(contractAbi, contractAddress);
            if (selectedAccount == "" || selectedAccount == null) return Swal.fire("Warning", "Please connect your wallet First", "warning");
            const id = "<?php echo $id; ?>";
            const balance = await web33.eth.getBalance(selectedAccount);
            const formatted = web33.utils.fromWei(balance, "ether");
            if (Number(formatted) < Number(amount)) return Swal.fire("Warning!", "Insufficient balance", "warning")
            console.log(formatted, " sonu ")
            let gasPrice = await web33.eth.getGasPrice();
            let estimateGas = await contract.methods.buyNFT(id.toString()).estimateGas({ from: selectedAccount, value: amount.toString() });
            console.log(estimateGas, gasPrice, " sonu")
            contract.methods.buyNFT(id.toString()).send({ from: selectedAccount, value: amount.toString(), gasPrice, gas: estimateGas }).then((response) => {
                if (response.status) {
                    Swal.fire("Congratulations!", "Item has been purchased successfully", "success").then((ok) => {
                        window.location.href = './profile.php';
                    })
                }
            })
        } catch (error) {
            console.log(error, " error")
        }
    }

</script>

<?php include 'footer.php' ?>