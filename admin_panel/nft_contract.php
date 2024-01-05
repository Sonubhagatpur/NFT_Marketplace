<? session_start();
if (empty($_SESSION['email'])) {
    header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin </title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.3.6/web3.min.js"
        integrity="sha512-jMEcX0Bev3VsCrACqEM3BFZvAMFXJSuTsMu0SttkAdMjquip6p3Oty5bbXrfg4T8n4g5BQYkGKxzLsrSqQgLUQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom styles for this page -->


</head>

<body id="page-top">

    <script>

        let supportedChainid = 97;
        let supportedRpcUrl = "https://goerli.infura.io/v3/";
        let supportedExplorer = "https://goerli.etherscan.io";
        let supportedNetwork = "BNB Testnet";

        // mainnet switch
        async function Switchchain() {
            try {
                await ethereum.request({
                    method: "wallet_switchEthereumChain",
                    params: [{ chainId: '0x' + supportedChainid.toString(16) }],
                });
                // connectWallet();
            } catch (switchError) {
                console.log(switchError);
                // This error code indicates that the chain has not been added to MetaMask.
                if (switchError.code === 4902) {
                    try {
                        await ethereum.request({
                            method: "wallet_addEthereumChain",
                            params: [
                                {
                                    chainId: '0x' + supportedChainid.toString(16),
                                    chainName: supportedNetworkName,
                                    rpcUrls: [supportedRPCurl], blockE
                                },
                            ],
                        });
                        // connectWallet();
                    } catch (addError) {
                        // handle "add" error
                    }
                }
                // handle other "switch" errors
            }
        }

        // CONNECT WALLET FUNCTION
        const connectWallet = async () => {
            try {
                if (window.ethereum) {

                    try {
                        wallet = "Metamask";
                        await window.ethereum.enable();
                        provider = await window.web3.currentProvider;
                        web3 = await new Web3(provider);
                        chainId = await web3.eth.net.getId();
                        let accounts = await web3.eth.getAccounts();
                        provider = await window.web3.currentProvider;
                        connectedAccount = accounts[0];
                        if (chainId == supportedChainid) {
                            document.getElementById("artistAddress").innerHTML = connectedAccount;
                            sessionStorage.removeItem("wallet");
                            sessionStorage.clear();
                            sessionStorage.setItem("wallet", wallet);

                        } else {
                            Swal.fire({
                                title: `<p>Please connect on ${supportedNetwork}</p>`,
                                showCloseButton: false,
                                showCancelButton: false,
                                focusConfirm: false,
                                allowOutsideClick: false,
                                confirmButtonText: "Add Network",
                                showConfirmButton: true,
                            }).then((ok) => {
                                Switchchain(supportedChainid)
                            })
                        }

                    } catch (err) {
                        // Swal.fire('error', err.message, "error");
                        console.log("err", err);
                    }


                } else {
                    Swal.fire('error', 'Not a Ethereum browser', "error");
                }
            }
            catch (e) {
                console.log("e", e)
                return;
            }
        }

        window.addEventListener('load', async () => {

            let wallet = sessionStorage.getItem("wallet");
            if (wallet == "Metamask") {
                connectWallet();
            } else if (wallet == "walletconnect") {
                connectWalletConnect();
            } else if (wallet == "tron") {
                connectTron();
            } else {
                console.log(wallet);
            }

        });

        window.ethereum.on('accountsChanged', function (accounts) {
            let wallet = sessionStorage.getItem("wallet");
            if (wallet == "Metamask") {
                connectWallet();
            } else if (wallet == "walletconnect") {
                connectWalletConnect();
            } else if (wallet == "tron") {
                connectTron();
            }
            window.location.reload();
        })

        window.ethereum.on('networkChanged', function (accounts) {
            let wallet = sessionStorage.getItem("wallet");
            if (wallet == "Metamask") {
                connectWallet();
            } else if (wallet == "walletconnect") {
                connectWalletConnect();
            } else if (wallet == "tron") {
                connectTron();
            }
            window.location.reload();
        })


        const onDisconnect = async () => {
            provider = null;
            connectedAccount = null;
            sessionStorage.removeItem("wallet");
            sessionStorage.clear();
            // document.getElementById("connectWallet").classList.remove("d-none");
            // document.getElementById("disconnect").classList.add("d-none");

        }
        setTimeout(() => {
            connectWallet();
        }, 2000);        
    </script>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <?php include("sidebar.php"); ?>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['email'] ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <section class="admin-page my-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="admin-top">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <h5 class=" tron-address">
                                                    <span>Admin Address :</span> <a href="#" class=""><span
                                                            id="artistAddress"></span></a>
                                                </h5>
                                            </div>
                                            <div class="col-md-7 pt-4">
                                                <h3 class="text-primary">
                                                    Set fees for NFT
                                                </h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4 class=" mb-3 mt-5">NFT Creation Fees</h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="nft-admin">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <!--<form action="" method="POST">-->
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="creatingFees"
                                                        name="creating_fees" aria-describedby="emailHelp"
                                                        placeholder="Enter NFT creation fees">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <h4 class=" mb-3 mt-5">NFT Selling</h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="nft-admin">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="sellingFees"
                                                        name="selling_fees" aria-describedby="emailHelp"
                                                        placeholder="Enter NFT selling Percenatge">
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="submit-here">
                                        <button type="submit" onclick="condition()" name="address"
                                            class="btn btn-primary form-control">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>

                    <div id="loadingdiv" class="d-none"
                        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 200;">
                        <div class=""
                            style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; height: 100vh; background: #1a080800;backdrop-filter: blur(10px);">
                            <h3>Transaction in process</h3>
                            <img src="https://scorep.co/uploads/loading-process.gif" class="rounded-pill" width="200"
                                height="200" />
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div id="loadingdiv" class="d-none"
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 200;">
        <div class=""
            style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; height: 100vh; background: #1a080800;backdrop-filter: blur(10px);">
            <h3 class="text-white">Transaction in process, Please wait and do not refresh the page.</h3>
            <img src="./uploads/loading-process.gif" class="rounded-pill" width="200" height="200" />
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->


    <!-- Page level custom scripts -->


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="assets/slick/slick.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".notification-drop .item").on('click', function () {
                $(this).find('ul').toggle();
            });
        });
    </script>

    <script>
        var contractAddress = "0x937c934F52807Ef10806e95E2C886308D77A99a9";
        var contractAbi = [{ "inputs": [], "stateMutability": "nonpayable", "type": "constructor" }, { "inputs": [], "name": "ERC721EnumerableForbiddenBatchMint", "type": "error" }, { "inputs": [{ "internalType": "address", "name": "sender", "type": "address" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "internalType": "address", "name": "owner", "type": "address" }], "name": "ERC721IncorrectOwner", "type": "error" }, { "inputs": [{ "internalType": "address", "name": "operator", "type": "address" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" }], "name": "ERC721InsufficientApproval", "type": "error" }, { "inputs": [{ "internalType": "address", "name": "approver", "type": "address" }], "name": "ERC721InvalidApprover", "type": "error" }, { "inputs": [{ "internalType": "address", "name": "operator", "type": "address" }], "name": "ERC721InvalidOperator", "type": "error" }, { "inputs": [{ "internalType": "address", "name": "owner", "type": "address" }], "name": "ERC721InvalidOwner", "type": "error" }, { "inputs": [{ "internalType": "address", "name": "receiver", "type": "address" }], "name": "ERC721InvalidReceiver", "type": "error" }, { "inputs": [{ "internalType": "address", "name": "sender", "type": "address" }], "name": "ERC721InvalidSender", "type": "error" }, { "inputs": [{ "internalType": "uint256", "name": "tokenId", "type": "uint256" }], "name": "ERC721NonexistentToken", "type": "error" }, { "inputs": [{ "internalType": "address", "name": "owner", "type": "address" }, { "internalType": "uint256", "name": "index", "type": "uint256" }], "name": "ERC721OutOfBoundsIndex", "type": "error" }, { "anonymous": false, "inputs": [{ "indexed": true, "internalType": "address", "name": "owner", "type": "address" }, { "indexed": true, "internalType": "address", "name": "approved", "type": "address" }, { "indexed": true, "internalType": "uint256", "name": "tokenId", "type": "uint256" }], "name": "Approval", "type": "event" }, { "anonymous": false, "inputs": [{ "indexed": true, "internalType": "address", "name": "owner", "type": "address" }, { "indexed": true, "internalType": "address", "name": "operator", "type": "address" }, { "indexed": false, "internalType": "bool", "name": "approved", "type": "bool" }], "name": "ApprovalForAll", "type": "event" }, { "anonymous": false, "inputs": [{ "indexed": true, "internalType": "address", "name": "previousOwner", "type": "address" }, { "indexed": true, "internalType": "address", "name": "newOwner", "type": "address" }], "name": "OwnershipTransferred", "type": "event" }, { "anonymous": false, "inputs": [{ "indexed": true, "internalType": "address", "name": "from", "type": "address" }, { "indexed": true, "internalType": "address", "name": "to", "type": "address" }, { "indexed": true, "internalType": "uint256", "name": "tokenId", "type": "uint256" }], "name": "Transfer", "type": "event" }, { "inputs": [{ "internalType": "uint256", "name": "", "type": "uint256" }], "name": "NftInfo", "outputs": [{ "internalType": "address", "name": "owner", "type": "address" }, { "internalType": "uint256", "name": "price", "type": "uint256" }, { "internalType": "bool", "name": "sell", "type": "bool" }], "stateMutability": "view", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "to", "type": "address" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" }], "name": "approve", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "owner", "type": "address" }], "name": "balanceOf", "outputs": [{ "internalType": "uint256", "name": "", "type": "uint256" }], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "baseURI", "outputs": [{ "internalType": "string", "name": "", "type": "string" }], "stateMutability": "view", "type": "function" }, { "inputs": [{ "internalType": "uint256", "name": "tokenId", "type": "uint256" }], "name": "buyNFT", "outputs": [], "stateMutability": "payable", "type": "function" }, { "inputs": [{ "internalType": "uint256", "name": "tokenId", "type": "uint256" }], "name": "getApproved", "outputs": [{ "internalType": "address", "name": "", "type": "address" }], "stateMutability": "view", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "owner", "type": "address" }, { "internalType": "address", "name": "operator", "type": "address" }], "name": "isApprovedForAll", "outputs": [{ "internalType": "bool", "name": "", "type": "bool" }], "stateMutability": "view", "type": "function" }, { "inputs": [{ "internalType": "uint256", "name": "quantity", "type": "uint256" }], "name": "mint", "outputs": [], "stateMutability": "payable", "type": "function" }, { "inputs": [], "name": "mintRate", "outputs": [{ "internalType": "uint256", "name": "", "type": "uint256" }], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "name", "outputs": [{ "internalType": "string", "name": "", "type": "string" }], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "owner", "outputs": [{ "internalType": "address", "name": "", "type": "address" }], "stateMutability": "view", "type": "function" }, { "inputs": [{ "internalType": "uint256", "name": "tokenId", "type": "uint256" }], "name": "ownerOf", "outputs": [{ "internalType": "address", "name": "", "type": "address" }], "stateMutability": "view", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "from", "type": "address" }, { "internalType": "address", "name": "to", "type": "address" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" }], "name": "safeTransferFrom", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "from", "type": "address" }, { "internalType": "address", "name": "to", "type": "address" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "internalType": "bytes", "name": "data", "type": "bytes" }], "name": "safeTransferFrom", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "internalType": "uint256", "name": "amount", "type": "uint256" }], "name": "sellNFT", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [], "name": "sellRate", "outputs": [{ "internalType": "uint256", "name": "", "type": "uint256" }], "stateMutability": "view", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "operator", "type": "address" }, { "internalType": "bool", "name": "approved", "type": "bool" }], "name": "setApprovalForAll", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "uint256", "name": "_mintRate", "type": "uint256" }], "name": "setMintRate", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "uint256", "name": "_sellRate", "type": "uint256" }], "name": "setSellRate", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "bytes4", "name": "interfaceId", "type": "bytes4" }], "name": "supportsInterface", "outputs": [{ "internalType": "bool", "name": "", "type": "bool" }], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "symbol", "outputs": [{ "internalType": "string", "name": "", "type": "string" }], "stateMutability": "view", "type": "function" }, { "inputs": [{ "internalType": "uint256", "name": "index", "type": "uint256" }], "name": "tokenByIndex", "outputs": [{ "internalType": "uint256", "name": "", "type": "uint256" }], "stateMutability": "view", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "owner", "type": "address" }, { "internalType": "uint256", "name": "index", "type": "uint256" }], "name": "tokenOfOwnerByIndex", "outputs": [{ "internalType": "uint256", "name": "", "type": "uint256" }], "stateMutability": "view", "type": "function" }, { "inputs": [{ "internalType": "uint256", "name": "tokenId", "type": "uint256" }], "name": "tokenURI", "outputs": [{ "internalType": "string", "name": "", "type": "string" }], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "totalSupply", "outputs": [{ "internalType": "uint256", "name": "", "type": "uint256" }], "stateMutability": "view", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "from", "type": "address" }, { "internalType": "address", "name": "to", "type": "address" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" }], "name": "transferFrom", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "newOwner", "type": "address" }], "name": "transferOwnership", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "_owner", "type": "address" }], "name": "walletOfOwner", "outputs": [{ "internalType": "uint256[]", "name": "", "type": "uint256[]" }], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "withdraw", "outputs": [], "stateMutability": "payable", "type": "function" }];


    </script>

    <script>

        function condition() {
            let create = document.getElementById("creatingFees").value;
            let sell = document.getElementById("sellingFees").value;
            let address = 0;


            if (create == "" || sell == "") {
                console.log("Good");

                swal("OOPS", "Please fill all the required fields", "warning");
            } else {
                Setcontractfess();

            }

        }

        async function Setcontractfess() {
            let create = document.getElementById("creatingFees").value;
            let sell = document.getElementById("sellingFees").value;
            let address = 0;
            if (provider != null && connectedAccount != null) {
                let myContract = new web3.eth.Contract(contractAbi, contractAddress);

                myContract
                    .methods
                    .setSellRate(sell.toString())
                    .send({ from: connectedAccount })
                    .then(async (hash) => {
                        document.getElementById("loadingdiv").className = "d-block";
                    })
                    .then(receipt => {
                        document.getElementById("loadingdiv").className = "d-none";
                        swal("Good job!", "Contract Fees are  set", "success");
                    })
                    .catch(err => {
                        document.getElementById("loadingdiv").className = "d-none";
                        console.log(err);
                        swal("warning", "Something went wrong", "warning");
                    });
            } else {
                swal("warning", "Please connect wallet", "warning");
            }
        }


    </script>

</body>

</html>