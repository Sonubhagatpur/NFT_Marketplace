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
                        <a class="breadcrumbs-link" href="index.html">Home</a><span class="sub-title"> Sell Now</span>
                        <img class="heading-left-image" src="assets/images/icon/home-shape.png" alt="Steps-Image" />
                    </div>
                    <h2><a class="title" href="#">Sell Now</a></h2>
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
                <div class="col-lg-8 col-12 m-auto">
                    <div class="col-area">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="put-on-marketplace mt-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="put-on-marketplace mb-3">
                                                <h6 class="font-weight-normal mb-0">Enter Your Price</h6>
                                                <small class="text-muted">Enter price to allow users instantly purchase
                                                    your NFT</small>
                                            </div>

                                            <div class="contuctus-form-sect">
                                                <form>
                                                    <input min="0" class="inputValue" type="number" placeholder="price"
                                                        required>
                                                </form>
                                            </div>
                                            <div class="bithu_v1_baner_buttons">
                                                <button onclick="resellNFT()" class="mint_btn hov_shape_show w-100">
                                                    Sell now
                                                    <span class="hov_shape1"><img
                                                            src="assets/images/icon/hov_shape_L_dark.svg" alt=""></span>
                                                    <span class="hov_shape2"><img
                                                            src="assets/images/icon/hov_shape_L_dark.svg" alt=""></span>
                                                    <span class="square_hov_shape_dark"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div
                                class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-0 order-lg-0 order-first sellItems">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .choosen_img {
        max-height: 300px;
        width: 100%;
        overflow: hidden;
    }

    .preview-box {
        inset: 0px;
        z-index: 1;
        height: 100%;
        width: 100%;
        position: relative;
        background: #1d1d31;
        padding: 18px;
        border-radius: 16px;
        border: 1px solid #31314f;
        overflow: hidden;
    }

    .upload-file-preview span {
        text-decoration: none;
        color: #fafafa;
        font-size: 15px;
        line-height: 20.7px;
        font-family: inherit;
        font-weight: 400;
        text-align: center;
    }

    .preview-section img#preview1 {
        width: 100%;
        height: auto;
    }
</style>

<script>
    $(document).ready(function () {
        myItems(selectedAccount);
    });

    async function myItems(selectedAccount) {
        const id = "<?php echo $id; ?>";
        const tokenURI = await contractInstance.methods.tokenURI(id).call();
        const data = await fetch(`https://ipfs.io/ipfs/${tokenURI.substr(7)}`)
        const json = await data.json();
        const images = `http://ipfs.io/ipfs/${(json.image).substr(7)}`;
        let exploreItems = `<div class="preview-section">
                                    <label>Preview</label>
                                    <div class="${json.name}-box">
                                        <div class="upload-file-preview">
                                        
                                            <img src="${images}" id="preview1" class="rounded"
                                                height="300px">
                                        </div>
                                    </div>
                                </div>`;
        document.querySelector('.sellItems').innerHTML = exploreItems;
    }

    const resellNFT = async () => {
        try {
            const web33 = new Web3(provider);
            const contract = new web33.eth.Contract(contractAbi, contractAddress);
            if (selectedAccount == "" || selectedAccount == null) return Swal.fire("Warning", "Please connect your wallet First", "warning");
            const value = document.querySelector('.inputValue').value;
            const id = "<?php echo $id; ?>";
            const owner = await contractInstance.methods.ownerOf(id).call();
            const weiValue = web3.utils.toWei(value, "ether");
            contract.methods.sellNFT(id.toString(), weiValue).send({ from: selectedAccount }).then((response) => {
                if (response.status) {
                    Swal.fire("Success", "Item price updated and sale started", "success").then((ok) => {
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