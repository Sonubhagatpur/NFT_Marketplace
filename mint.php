<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- meta tag -->
    <meta charset="utf-8" />
    <title> NYBC COINS - NFT Minting/Collection</title>
    <meta name="description" content="" />
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.html" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.jpg" />
    <!-- Bootstrap v4.4.1 css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css" />
    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome-min.css" />
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href="assets/css/off-canvas.css" />
    <!-- flaticon css  -->
    <link rel="stylesheet" type="text/css" href="assets/css/ico-moon-fonts.css" />
    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="assets/css/swiper.css" />
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href="assets/css/sc-spacing.css" />
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />

    <style>
        .logo img {
            width: 65px;
            border-radius: 8px;
        }

        .footer_logo img {
            width: 60px;
            border-radius: 7px;
        }
    </style>
</head>

<body>
    <!--Preloader area start here-->
    <section class="loader_first">
        <div class="loader_first_inner">
            <div class="circular-spinner"></div>
        </div>
    </section>
    <!--Preloader area End here-->
    <!-- Hader  section -->
    <div class="bithu_mint_header bithu_header" id="navbar">
        <div class="bithu_mint_header_inner">
            <div class="bithu_mint_header_left">
                <div class="logo">
                    <a href="index.php"><img src="assets/images/NYB-Coin.jpg" alt="logo" /></a>
                </div>
            </div>
            <div class="bithu_mint_header_right d-flex">
                <div class="connect-btn connectedAccount">
                    <button class="btn-small-gray hov_shape_show" data-bs-toggle="modal" data-bs-target="#connectModal">
                        <img src="assets/images/icon/connect_wallet.svg" alt="" class="btn_icon" />CONNECT
                        <span class="hov_shape1"><img src="assets/images/icon/hov_shape_s.svg" alt="" /></span>
                        <span class="hov_shape2"><img src="assets/images/icon/hov_shape_s.svg" alt="" /></span>
                        <span class="square_hov_shape"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="buthu_mint_body buthu_mint1_body">
        <div class="buthu_mint1_bg">
            <div class="buthu_mint_bg_overlay">
                <canvas id="canvas" class="firefly_bg"></canvas>
            </div>
        </div>
        <div class="container">
            <div class="buthu_mint_body_content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="buthu_mint1_body_left">
                            <div class="buthu_mint1_body_left_content">
                                <div class="mint-item_img">
                                    <div class="mint-slideshow-container">

                                        <div class="mintSlides">
                                            <img src="assets/images/nft/v4-slider-img.png" alt="img"
                                                class="img-fluid" />
                                        </div>

                                        <div class="mintSlides">
                                            <img src="assets/images/nft/v4-slider-img2.png" alt="img"
                                                class="img-fluid" />
                                        </div>

                                        <div class="mintSlides">
                                            <img src="assets/images/nft/v4-slider-img3.png" alt="img"
                                                class="img-fluid" />
                                        </div>

                                        <div class="mintSlides">
                                            <img src="assets/images/nft/v4-slider-img4.png" alt="img"
                                                class="img-fluid" />
                                        </div>

                                    </div>
                                    <br>

                                    <div style="display: none">
                                        <span class="dotmint"></span>
                                        <span class="dotmint"></span>
                                        <span class="dotmint"></span>
                                        <span class="dotmint"></span>
                                    </div>
                                </div>
                                <div class="mint_count_list mt-0">
                                    <ul class="mt-10">
                                        <li>
                                            <h5>Remaining</h5>
                                            <h5 id="totalSupply"></h5>
                                        </li>
                                        <li>
                                            <h5>Price</h5>
                                            <h5 id="mintRate"></h5>
                                        </li>
                                        <li>
                                            <h5>Quantity</h5>
                                            <div class="mint_quantity_sect">
                                                <button onclick="quantity(-1)" class="input-number-decrement">-</button>
                                                <input min="1" max="10" class="input-number quantity" type="text"
                                                    value="1">
                                                <button onclick="quantity(-1)" class="input-number-increment">+</button>
                                            </div>
                                            <h5><span class="quantityAmount">0.0001</span> NYBC</h5>
                                        </li>

                                    </ul>
                                </div>
                                <button onclick="mint()" id="mintButton" class="btn-mid-green w-100 hov_shape_show">
                                    MINT NOW
                                    <span class="hov_shape1"><img src="assets/images/icon/hov_shape_L_dark.svg"
                                            alt="" /></span>
                                    <span class="hov_shape2"><img src="assets/images/icon/hov_shape_L_dark.svg"
                                            alt="" /></span>
                                    <span class="square_hov_shape"></span>
                                </button>
                                <p>By clicking “MINT”, You agree to our <a href="#">Terms of Service</a> and our <a
                                        href="#">Privacy Policy.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="buthu_mint1_body_right">
                            <div class="mint1_mash_gard">
                                <span><img src="assets/images/nft/v4_baner_mesh-grad.png" alt="img" /></span>
                            </div>
                            <h4 class="mb-12">WHITELIST : SOLDOUT <span><img
                                        src="assets/images/icon/mint-right-text-icon.svg" alt="icon" /></span></h4>
                            <h4 class="mb-15">Presale : SOLDOUT <span><img
                                        src="assets/images/icon/mint-right-text-icon.svg" alt="icon" /></span></h4>
                            <!-- <h1>PUBLIC MINT LIVE</h1>

                            <div class="buthu_mint1_body_right_timer">
                                <h5 class="uppercase">Public Mint end in</h5>
                                <div class="timer timer_1">
                                    <ul>
                                        <li class="days">24<span>D</span></li>
                                        <li class="hours">15<span>H</span></li>
                                        <li class="minutes">44<span>M</span></li>
                                        <li class="seconds">18<span>S</span></li>
                                    </ul>
                                </div>
                            </div> -->

                            <h5 class="mb-12 uppercase">Max 10 NFTs per Transaction</h5>
                            <h5 class="mb-12 uppercase">Price 100 NYBC + gas</h5>
                            <!-- <h5 class="mb-12 uppercase">Mint is live until 25 apr 04:00H</h5> -->

                            <div class="buthu_mint1_body_right_btns">
                                <button class="btn-mid-transparent hov_shape_show">
                                    <img src="assets/images/icon/dis_logo.svg" alt="icon" class="btn_icon" />Join
                                    Discord
                                    <span class="hov_shape1"><img src="assets/images/icon/hov_shape_L.svg"
                                            alt="" /></span>
                                    <span class="hov_shape2"><img src="assets/images/icon/hov_shape_L.svg"
                                            alt="" /></span>
                                    <span class="square_hov_shape"></span>
                                </button>
                                <button class="btn-mid-transparent hov_shape_show">
                                    <img src="assets/images/icon/Twitter.svg" alt="icon" class="btn_icon" />Join Twitter
                                    <span class="hov_shape1"><img src="assets/images/icon/hov_shape_L.svg"
                                            alt="" /></span>
                                    <span class="hov_shape2"><img src="assets/images/icon/hov_shape_L.svg"
                                            alt="" /></span>
                                    <span class="square_hov_shape"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Connect Wallet Modal -->
    <div class="connect_modal">
        <div class="modal fade " id="connectModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal_overlay">
                        <div class="modal_header">
                            <h2>Connect Wallet</h2>
                            <button data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="modal_body text-center">
                            <p>Please select a wallet to connect for start Minting your NFTs</p>
                            <div class="connect-section">
                                <ul class="heading-list">
                                    <li onclick="connectmetamask()"><a href="#" class="connect-meta"><span><img
                                                    src="assets/images/icon/MetaMask.svg"
                                                    alt="Meta-mask-Image"></span>MetaMask</a></li>
                                    <!-- <li><a href="#"><span><img src="assets/images/icon/Formatic.svg"
                                                    alt="Coinbase-Image"></span>Coinbase</a></li>
                                    <li><a href="#"><span><img src="assets/images/icon/Trust_Wallet.svg"
                                                    alt="Trust-Image"></span>Trust Wallet</a></li>
                                    <li><a href="#"><span><img src="assets/images/icon/WalletConnect.svg"
                                                    alt="Wallet-Image"></span>WalletConnect</a></li> -->
                                </ul>
                            </div>
                            <h6>By connecting your wallet, you agree to our <a href="#">Terms of Service</a> and our <a
                                    href="#">Privacy Policy</a>.</h6>
                        </div>
                        <div class="modal_bottom_shape">
                            <span class="modal_bottom_shape_left"><img src="assets/images/icon/hov_shape_L.svg"
                                    alt="" /></span>
                            <span class="modal_bottom_shape_right"><img src="assets/images/icon/hov_shape_L.svg"
                                    alt="" /></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Connect Wallet Modal -->


    <!-- Connect Wallet Modal -->
    <div class="connect_modal">
        <div class="modal fade " id="download-metamask" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal_overlay">
                        <div class="modal_header">
                            <h2>Connect Wallet</h2>
                            <button data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="modal_body text-center">
                            <p>Please download & install metamask extension!</p>
                            <div class="connect-section">
                                <ul class="heading-list">
                                    <li><a href="https://metamask.io/download/" target="_blank"><span><img
                                                    src="assets/images/icon/MetaMask.svg"
                                                    alt="Meta-mask-Image"></span>MetaMask</a></li>
                                </ul>
                            </div>
                            <h6>By connecting your wallet, you agree to our <a href="#">Terms of Service</a> and our <a
                                    href="#">Privacy Policy</a>.</h6>
                        </div>
                        <div class="modal_bottom_shape">
                            <span class="modal_bottom_shape_left"><img src="assets/images/icon/hov_shape_L.svg"
                                    alt="" /></span>
                            <span class="modal_bottom_shape_right"><img src="assets/images/icon/hov_shape_L.svg"
                                    alt="" /></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'connect.php' ?>

    <script>
        $(document).ready(function () {
            AllDetails();
        });

        const AllDetails = async () => { //mintRate
            try {
                const totalSupply = await contractInstance.methods.totalSupply().call();
                const mintRate = await contractInstance.methods.mintRate().call();
                const price = web3.utils.fromWei(mintRate, "ether");
                document.getElementById('totalSupply').innerHTML = `<span class="count">${totalSupply}</span> / 5000 Minted`;
                document.getElementById('mintRate').innerHTML = price + ' ' + currency;
                console.log(totalSupply, " totalSupply")

            } catch (error) {
                console.log(error)
            }
        }
    </script>

    <!-- development start -->
    <script>
        async function quantity() {
            let price = await contractInstance.methods.mintRate().call();
            let formatted = web3.utils.fromWei(price.toString(), 'ether');
            let quantity = document.querySelector('.quantity').value;
            let quantityAmount = formatted * quantity;
            document.querySelector('.quantityAmount').innerHTML = getMe2DecimalPointsWithCommas(quantityAmount);
        }

        async function mint() {
            try {
                if (provider == "" || provider == null) return Swal.fire("Error", "Please connect your wallet first", "error")
                const web33 = new Web3(provider);
                document.getElementById("mintButton").disabled = true;
                const contract = new web33.eth.Contract(contractAbi, contractAddress);
                let price = await contract.methods.mintRate().call();
                let quantity = document.querySelector('.quantity').value;
                let quantityAmount = price * quantity;
                const balance = await web33.eth.getBalance(selectedAccount);
                const formatted = web33.utils.fromWei(balance, "ether");
                const quantityFormat = web33.utils.fromWei(quantityAmount.toString(), "ether");
                if (Number(formatted) < Number(quantityFormat)) return Swal.fire("Warning!", "Insufficient balance", "warning");
                let gasPrice = await web33.eth.getGasPrice();
                document.getElementById('mintButton').innerHTML = `<i class="fa fa-cog fa-spin" style="font-size:35px"></i>`;
                let estimateGas = await contract.methods.mint(quantity.toString()).estimateGas({ from: selectedAccount, value: quantityAmount });
                contract.methods.mint(quantity.toString()).send({ from: selectedAccount, value: quantityAmount, gasPrice, gas: estimateGas }).then((response) => {
                    document.getElementById('mintButton').innerHTML = `<i class="fas fa-check-circle" style="font-size:35px"></i>`;
                    if (response.status) {
                        Swal.fire('Success', 'Transaction compeleted', 'success').then((ok) => {
                            window.location.href = './profile.php';
                        });
                    }
                }).catch((error) => {
                    document.getElementById("mintButton").disabled = false;
                    document.getElementById('mintButton').innerHTML = "MINT NOW";
                    if (error.code == 4001) return Swal.fire("Payment cancel!", "you denied transaction signature", "error")
                })

            } catch (error) {
                document.getElementById("mintButton").disabled = false;
                document.getElementById('mintButton').innerHTML = "MINT NOW";
                console.log(error, " error")
            }
        }
    </script>


    <!-- development end -->


    <!-- Connect Wallet Modal -->
    <!-- Bootstrap.min js -->
    <!-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- web3 min.js -->
    <script src="assets/js/web3.min.js"></script>
    <!-- modernizr.js -->
    <script src="assets/js/modernizr-2.8.3.min.js"></script>
    <!-- jquery.min js -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- imagesloaded.pkgd.min js -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- wow.min js -->
    <script src="assets/js/wow.min.js"></script>
    <!-- fireflys js -->
    <script src="assets/js/fireflys.js"></script>
    <!-- counterup.min js -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- waypoints.min js -->
    <script src="assets/js/waypoints.min.js"></script>
    <!-- plugins.min js -->
    <script src="assets/js/plugins.js"></script>
    <!-- faq.min js -->
    <script src="assets/js/faq.js"></script>
    <!-- swiper.js -->
    <script src="assets/js/swiper-min.js"></script>
    <!-- Timer.js -->
    <script src="assets/js/time-counter.js"></script>
    <!-- metamask-handeler -->
    <script src="assets/js/metamaskhandler.js"></script>
    <script src="assets/js/metamask.js"></script>
    <!-- demo js -->
    <script src="assets/js/demo.js"></script>
    <!-- main js -->
    <script src="assets/js/main.js"></script>

    <script>
        //Auto Slide mintn One

        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mintSlides");
            let dots = document.getElementsByClassName("dotmint");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 500); // Change image every 2 seconds
        };
    </script>

    <!--
        <script>
            var i = 0;

            function btnClk_Inc() {
                i++;
                document.getElementById('quantity2').value = i;
            };

            function btnClk_Dec() {
                i--;
                document.getElementById('quantity2').value = i;
            };
        </script>
-->
    <script>
        var i = 0;

        function buttonClick_Inc() {
            i++;
            document.getElementById('quantity').value = i;
        };

        function buttonClick_Dec() {
            i--;
            document.getElementById('quantity').value = i;
        };
    </script>

</body>

</html>