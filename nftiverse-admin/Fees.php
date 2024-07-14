 <?php include "header.php";?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-rss"></i> Fees Setting </h4>
                         </div> 
                      </div>  
                    </div>
                    
                     <div class="row mt-5">
                            <div class="col-12">
                                <div class="card py-4 px-3">
                                        <form >
                                            <div class="row"> 
                                                <div class="form-group col-lg-6">
                                                    <label>Select Level *</label>
                                                  
                                                    
                                                   <select name="level" class="form-control" id="fees_level">
                                                    <option value="0">Mint</option>
                                                    <option value="1">Sale</option>
                                                    </select>
                    
                                                </div>
                    
                                                <div class="form-group col-lg-6">
                                                    <label>Fees <span %</span> <span class="text-danger">*</span></label>
                                                    <input type="number" min='0' id="fees_system" class="form-control" name="fees" required="">
                                                </div> 
                                            </div> 
                    
                                            <div>
                                                <a onclick="setFees(0)" type="submit" class="btn btn-success mt-3">Save</a>
                                            </div>
                                        </form>                     
                                </div>
                                 
                            </div>
                     </div> 
                     
                     
                     <div class="row mt-4">
                         <div class="col-md-12">
                             <div class="card px-3 pt-3">
                                <div class="table-responsive">
                                    <p class="text-success">Fees of sale percentage calculate on item price &amp; Transfer fees deducted from transferred user. </p>
                                    <table class="table table-striped table-hover table-bordered mt-2">
                                        <thead>
                                            <tr>
                                                <th>Level</th>
                                                <th>Fees</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                
                                        <tbody>
                                            <tr>
                                                <td>Mint</td>
                                                <td class="text-right mintFees"></td>
                                                <td>
                                                    <a onclick="setFees(1, 0)" ><i class="fas fa-trash-alt" aria-hidden="true" style="background: red;color: white;padding: 5px;"></i></a>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Sale</td>
                                                <td class="text-right sellRate"></td>
                                                <td>
                                                    <a onclick="setFees(1, 1)" ><i class="fas fa-trash-alt" aria-hidden="true" style="background: red;color: white;padding: 5px;"></i></a>
                                                </td>
                                            </tr>
                                                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                     </div>
                    
                </div>
           </section> 
           
           <style>
               .radio-inline {text-align: center;}
               .radio-inline input {  height: 26px;}
           </style>
           
<script type="module">
    import { WagmiCore } from "https://unpkg.com/@web3modal/ethereum@2.6.2";
    const { getContract, writeContract, getAccount, waitForTransaction, fetchBalance, watchAccount } = WagmiCore
    let contractInstance = getContract({ address: contractAddress, abi: contractAbi, chainId: chainId });
    const owner = await contractInstance.read.owner();
    const sellRate = Number(await contractInstance.read.sellRate());
    const mintFees = Number(await contractInstance.read.mintFees());
    document.querySelector(".sellRate").innerHTML = sellRate+ "%";
    document.querySelector(".mintFees").innerHTML = mintFees+ "%";
    const account = getAccount();
    let isConnected = account.isConnected;
    let selectedAddress = account.address;

    watchAccount(async (account) => {
        selectedAddress = account.address;
        isConnected = account.isConnected;
    });
    
    
    window.setFees = async function setFees(status, tab){
        let selectedType = document.getElementById("fees_level").value;
        if(status==0){
        let fees_system_value = document.getElementById("fees_system").value;
        if(fees_system_value=="")  return Swal.fire("Error", "Please enter fees percentage", "error");
        if(Number(fees_system_value) > 50) return Swal.fire("Error", "Fees must be less then 50%", "error");
            if(selectedType==0){
            await setPlatformFees("setMintFees", Number(fees_system_value))
            }else{
                
              await setPlatformFees("setSellRate", Number(fees_system_value))  
            }
        }else{
            console.log("Null fees");
            if(tab==0){
            await setPlatformFees("setMintFees", 0)
            }else{
              await setPlatformFees("setSellRate", 0)  
            }
            
        }
        
    }

 
   async function setPlatformFees(customFunction, percentage) {
        if (!isConnected) return Swal.fire("Error", "Please connect your wallet first", "error");
        if (owner != selectedAddress) return Swal.fire("Error", "You are not the owner", "error")
        try {
            document.getElementById("loading").style.display = "block";
            writeContract({
                address: contractAddress,
                abi: contractAbi,
                functionName: customFunction,
                args: [percentage],
                chainId: chainId
            }).then(async (response) => {
                let hash = await response.hash;
                const data = await waitForTransaction({
                    hash,
                });
                if (data.status == "success") {
                    document.getElementById("loading").style.display = "none";
                    const message = "Fees has been updated";
                    Swal.fire(
                        "Transaction Completed!",
                        `Congratulations, ${message}`,
                        "success"
                    ).then((ok) => {
                        window.location.href = './Fees.php';
                    });
                }

            }).catch((error) => {
                document.getElementById("loading").style.display = "none";
                console.log(error, " error")
            });

        } catch (error) {
            document.getElementById("loading").style.display = "none";
            console.log(error, " error")
        }
    }
    


</script>
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>           