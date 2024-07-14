 <?php include "header.php";?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-arrow-right-arrow-left"></i> Own Transfer NFTs</h4>
                         </div> 
                      </div>  
                    </div>
                    
                    <div class="row mt-4">
                       <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">NFT ID</th>
                              <th scope="col">Name </th>
                              <th scope="col">Image</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>54</td>
                              <td>Demo</td>
                              <td><img src="./img/crs-14.jpg" width="30"></td>
                              <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width:auto">Transfer</button></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
           </section> 
           
      
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> Transfer NFTs</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Reciver address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="fhgduyfshgf">
        </div>
        <button type="button" class="btn btn-info">Send</button>
        
      </div>
    </div>
  </div>
</div>

           
           
    <script type="module">
        import { WagmiCore } from "https://unpkg.com/@web3modal/ethereum@2.6.2";
        const { getContract, writeContract, getAccount, watchAccount, waitForTransaction, fetchBalance } = WagmiCore
        let contractInstance = getContract({ address: contractAddress, abi: contractAbi, chainId: chainId });
        const account = getAccount();
        let isConnected = account.isConnected;
        let selectedAddress = account.address;
        if (isConnected) {
            myItems(selectedAddress)
        }
        watchAccount(async (account) => {
            selectedAddress = account.address;
            isConnected = account.isConnected;
            if (isConnected) {
                myItems(selectedAddress)
            }
        })
    
        async function myItems(selectedAddress) {
        var formdata = new FormData();
        formdata.append("address", selectedAddress);
        formdata.append("type", "owned");

        var requestOptions = {
            method: "POST",
            body: formdata,
            redirect: "follow",
        };
        fetch("../itemsdata.php", requestOptions)
            .then((response) => response.json())
            .then(async (createnft) => {
                
                console.log(createnft, " createnftcreatenft")
               

            })
    }
    </script>
           
           
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>           