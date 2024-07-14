import { WagmiCore } from 'https://unpkg.com/@web3modal/ethereum@2.6.2';

const web3 = new Web3();

const { getAccount, watchNetwork, getContract, fetchBalance, writeContract, waitForTransaction, watchAccount } = WagmiCore
const account = getAccount();
let contractInstance = getContract({ address: contractAddress, abi: contractAbi, chainId: chainId });
const owner = await contractInstance.read.owner();
let isConnected = account.isConnected;
let selectedAddress = account.address;

watchAccount((account) => {
    selectedAddress = account.address;
    isConnected = account.isConnected;
    if (!isConnected) return;

})
watchNetwork((network) => {
    let chain = network.chain;
    if (chain != undefined) {
        let chainId = chain.id;
        if (chainId != chainId) { switchNetwork(chainId); }
    }
});

async function switchNetwork(switchChainId) {
    try {
        await ethereum.request({
            method: 'wallet_switchEthereumChain',
            params: [{ chainId: '0x' + switchChainId.toString(16) }],
        });
    } catch (switchError) {

        console.log(switchError)
        // This error code indicates that the chain has not been added to MetaMask.
        if (switchError.code === 4902) {
            try {
                await ethereum.request({
                    method: 'wallet_addEthereumChain',
                    params: [
                        {
                            chainId: '0x' + switchChainId.toString(16),
                            chainName: 'BNB Chain',
                            rpcUrls: ['https://bsc-dataseed.binance.org/'],
                            blockExplorerUrls: [explorer],

                            nativeCurrency: {
                                name: currency,
                                symbol: currency, // 2-6 characters long
                                decimals: 18,
                            },
                        },
                    ],
                });
            } catch (addError) {

            }
        }

    }
}

function toastMessage(status, title) {
    Swal.fire({
        toast: true,
        icon: status,
        title: title,
        animation: false,
        position: 'bottom-right',
        showConfirmButton: false,
        timer: 3000,
        animation: true,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
}


export async function userBlockUnblock(status, userAddress){
    
    console.log(status, userAddress, " status, userAddress")
    if (!isConnected) return toastMessage("error", "Please Connect your wallet First!.");
    if (selectedAddress.toLowerCase() != owner.toLowerCase()) return toastMessage("error", "Only owner can call.");
    if(status==1){
        await addToUserBlackList(status,userAddress.trim(), "addToBlacklist");
    }else{
        await addToUserBlackList(status,userAddress.trim(), "removeFromBlacklist");
    }
    
}


 async function addToUserBlackList(status,userAddress, customFunction){
    try { 
        console.log(status,userAddress, customFunction, " status,userAddress, customFunction")
        document.getElementById("loading").style.display = "block";
        writeContract({
            address: contractAddress,
            abi: contractAbi,
            functionName: customFunction,
            chainId: chainId,
            args: [userAddress]
        }).then(async (response) => {
            let hash = await response.hash;
            const data = await waitForTransaction({
                hash,
            });
            if (data) {
                var formdata = new FormData();
                formdata.append("blackList", "USER"); 
                formdata.append("status", status);
                formdata.append("userAddress", userAddress);
                var requestOptions = {
                    method: "POST",
                    body: formdata,
                    redirect: "follow",
                };
                fetch("./blackList.php", requestOptions)
                    .then((response) => response.json())
                    .then(result=>{
                        document.getElementById("loading").style.display = "none";
                        console.log(result, " result")
                        
                        if(result.code==200){
                         toastMessage("success", result.message);
                        }else{
                        toastMessage("error", result.message);  
                        }
                        
                        window.location.href= "./customers.php";
                    })
                .catch((error)=>{
                    console.log(error, " errorerror")
                    document.getElementById("loading").style.display = "none";
                });
                }

        }).catch((error) => {
            document.getElementById("loading").style.display = "none";
            console.log(error, " error")
            toastMessage("error", "Rejected the request, Transaction Failed");

        });
    } catch (error) {
        console.log(error, " errorerror")
        document.getElementById("loading").style.display = "none";
    }


}

export async function NFTBlockUnblock(status, NFT_id){
    
    if (!isConnected) return toastMessage("error", "Please Connect your wallet First!.");
    if (selectedAddress.toLowerCase() != owner.toLowerCase()) return toastMessage("error", "Only owner can call.");
    if(status==1){
        await addToNFTBlackList(status,NFT_id.trim(), "addToBlacklist");
    }else{
        await addToNFTBlackList(status,NFT_id.trim(), "removeFromBlacklist");
    }
    
}




 async function addToNFTBlackList(status,NFT_id, customFunction){
    try { 
        let isBlacklisted = await contractInstance.read.isBlacklistedNFT([NFT_id]);
        console.log(isBlacklisted, " visBlacklistedNFT")
        document.getElementById("loading").style.display = "block";
        writeContract({
            address: contractAddress,
            abi: customAbi,
            functionName: customFunction,
            chainId: chainId,
            args: [NFT_id]
        }).then(async (response) => {
            let hash = await response.hash;
            const data = await waitForTransaction({
                hash,
            });
            if (data) {
                var formdata = new FormData();
                formdata.append("blackList", "NFT"); 
                formdata.append("status", status);
                formdata.append("NFT_id", NFT_id);
                var requestOptions = {
                    method: "POST",
                    body: formdata,
                    redirect: "follow",
                };
                fetch("./blackList.php", requestOptions)
                    .then((response) => response.json())
                    .then(result=>{
                        document.getElementById("loading").style.display = "none";
                        console.log(result, " result")
                        
                        if(result.code==200){
                         toastMessage("success", result.message);
                        }else{
                        toastMessage("error", result.message);  
                        }
                        
                        window.location.href= "./AllNfts-list.php";
                    })
                .catch((error)=>{
                    console.log(error, " errorerror")
                    document.getElementById("loading").style.display = "none";
                });
                }

        }).catch((error) => {
            document.getElementById("loading").style.display = "none";
            toastMessage("error", "Rejected the request, Transaction Failed");

        });
    } catch (error) {
        console.log(error, " errorerror")
        document.getElementById("loading").style.display = "none";
    }


}


