import {
    EthereumClient,
    w3mConnectors,
    w3mProvider,
    WagmiCore,
    WagmiCoreChains,
    WagmiCoreConnectors
} from 'https://unpkg.com/@web3modal/ethereum@2.6.2'

import { Web3Modal } from 'https://unpkg.com/@web3modal/html@2.6.2'
const { configureChains, createConfig } = WagmiCore;
const { bscTestnet } = WagmiCoreChains

const customChain = {
    id: chainId,
    name: "Blokista Testnet",
    network: "Blokista Testnet",
    nativeCurrency: {
        decimals: 18,
        name: "BCC",
        symbol: "BCC",
    },
    rpcUrls: {
        public: { http: ["https://testnet-rpc.bccscan.com/"] },
        default: { http: ["https://testnet-rpc.bccscan.com/"] },
    },
    blockExplorers: {
        etherscan: {
            name: "BCC",
            url: "https://testnet-explorer.bccscan.com/",
        },
        default: {
            name: "BCC",
            url: "https://testnet-explorer.bccscan.com/",
        },
    },
};

// Equivalent to importing from @wagmi/core/providers
const { CoinbaseWalletConnector } = WagmiCoreConnectors
const chains = [customChain]
const projectId = 'c2db982217ae681082036c7f734ca146'

const { publicClient } = configureChains(chains, [w3mProvider({ projectId })])
const wagmiConfig = createConfig({
    autoConnect: true,
    connectors: w3mConnectors({ projectId, chains }),
    publicClient
});
const ethereumClient = new EthereumClient(wagmiConfig, chains)
const web3modal = new Web3Modal({ projectId }, ethereumClient)
web3modal.setDefaultChain(1);


const { getAccount, watchNetwork, getContract, fetchBalance, writeContract, waitForTransaction, watchAccount } = WagmiCore
const account = getAccount();
let contractInstance = getContract({ address: contractAddress, abi: contractAbi, chainId: chainId });


let isConnected = account.isConnected;
let selectedAddress = account.address;

watchAccount(async (account) => {
    selectedAddress = account.address;
    isConnected = account.isConnected;
    if (isConnected) {
        user(selectedAddress);
        userData(selectedAddress)
    }
})
watchNetwork(async (network) => {
    let chain = network.chain;
    if (chain != undefined) {
        let chainid = chain.id;
        if (chainid != chainId) { switchNetwork(chainId); }
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
                            chainName: 'Blokista Testnet',
                            rpcUrls: ['https://testnet-rpc.bccscan.com/'],
                            blockExplorerUrls: ['https://testnet-explorer.bccscan.com/'],

                            nativeCurrency: {
                                name: "BCC",
                                symbol: "BCC", // 2-6 characters long
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


// export async function like(NFT_id, NFT_name, NFT_image) {
//     console.log(NFT_id, NFT_name, NFT_image, " NFT_id, NFT_name, NFT_image");
//     let elements = document.querySelectorAll(`[data-nft-id="${NFT_id}"]`);
//     let totalElement = Array.from(elements).find(element => element.classList.contains('count'));
//     let total = Number(totalElement.innerHTML);
//     console.log(total, elements, " total, elements");
//     let newClass = "active";

//     if (selectedAddress) {
//         const likeUsers = await getLike('love', NFT_id, selectedAddress);
//         if (likeUsers) {
//             elements.forEach(element => {
//                 element.classList.remove(newClass);
//                 if (element.classList.contains('count') && total > 0) {
//                     total -= 1;
//                     element.innerHTML = total;
//                 }
//             });
//         } else {
//             elements.forEach(element => {
//                 element.classList.add(newClass);
//                 if (element.classList.contains('count')) {
//                     total += 1;
//                     element.innerHTML = total;
//                 }
//             });
//         }
//         await saveLike('save', NFT_id, NFT_name, selectedAddress, NFT_image);
//     }
// }


export async function like(NFT_id) {
    let total = document.getElementById(`count${NFT_id}`).innerHTML;
    let element = document.getElementById(`love${NFT_id}`);
    let newClass = "text-danger";
    if (isConnected) {
        const likeUsers = await getLike('love', NFT_id, selectedAddress);
        if (likeUsers != "" && likeUsers != null) {
            element.classList.remove(newClass)
            document.getElementById(`count${NFT_id}`).innerHTML = Number(total) - 1;
        } else {
            element.classList.add(newClass)
            document.getElementById(`count${NFT_id}`).innerHTML = Number(total) + 1;
        }
        await saveLike('save', NFT_id, selectedAddress);
    }
}

export async function likeNewItem(NFT_id) {
    let total = document.getElementById(`countNew${NFT_id}`).innerHTML;
    let element = document.getElementById(`loveNew${NFT_id}`);
    let newClass = "text-danger";
    if (isConnected) {
        const likeUsers = await getLike('love', NFT_id, selectedAddress);
        if (likeUsers != "" && likeUsers != null) {
            element.classList.remove(newClass)
            document.getElementById(`countNew${NFT_id}`).innerHTML = Number(total) - 1;
        } else {
            element.classList.add(newClass)
            document.getElementById(`countNew${NFT_id}`).innerHTML = Number(total) + 1;
        }
        await saveLike('save', NFT_id, selectedAddress);
    }
}

export async function likeExplore(NFT_id) {
    let total = document.getElementById(`countExplore${NFT_id}`).innerHTML;
    let element = document.getElementById(`loveExplore${NFT_id}`);
    let newClass = "text-danger";
    if (isConnected) {
        const likeUsers = await getLike('love', NFT_id, selectedAddress);
        if (likeUsers != "" && likeUsers != null) {
            element.classList.remove(newClass)
            document.getElementById(`countExplore${NFT_id}`).innerHTML = Number(total) - 1;
        } else {
            element.classList.add(newClass)
            document.getElementById(`countExplore${NFT_id}`).innerHTML = Number(total) + 1;
        }
        await saveLike('save', NFT_id, selectedAddress);
    }
}

async function userData(selectedAddress){
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
                    console.log("result selectedAddress ", result);
                    document.querySelector('.userName').innerHTML = result.Username;
                    document.querySelector('.Userimage').src = result.Userimage;
                })
                .catch(error => console.log('error', error));
        } catch (error) {
            console.log(error, " error")
        }
    
    
}


