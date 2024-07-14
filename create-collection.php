<?php include "header.php";?>

 <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            
             <section id="section-hero" class="mt-5">
                <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 offset-lg-3 text-center">
                                <h1>Create Collection</h1>
                            </div>
                        </div>
                    </div>
            </section>
            
            
              <!-- section begin -->
            <section aria-label="section" class="pt-0">
                <div class="container">
                    <div class="row wow fadeIn animated" style="background-size: cover; visibility: visible; animation-name: fadeIn;">
                        <div class="col-lg-8 mb-sm-20" style="background-size: cover;">
                                <div class="field-set" style="background-size: cover;">
                                    <h5>Collection Name *</h5>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Collection Name">                                    

                                    <div class="spacer-20" style="background-size: cover;"></div>
                                    
                                    <h5>Collection Title *</h5>
                                    <input type="text" name="username" id="title" class="form-control" placeholder="Collection Title">                                    

                                    <div class="spacer-20" style="background-size: cover;"></div>

                                    <h5>Custom URL</h5>
                                    <input type="text" name="url" id="url" class="form-control" placeholder="Enter your custom URL">

                                    <div class="spacer-20" style="background-size: cover;"></div>

                                    <h5>Collection Description</h5>
                                    <textarea name="bio" id="description" class="form-control" placeholder=""></textarea>

                                    <div class="spacer-20" style="background-size: cover;"></div>

                                    <h5>Collection Category *</h5>
                                    <select name="category" class="form-select" id="category" required="required">
                                        <option value="" selected="selected">Select Category</option>
                                        <option value="ART">ART</option>
                                        <option value="Sandalwood">Sandalwood</option>
                                        <option value="Flikmart">Flikmart</option>
                                    </select>
                                    
                                     <div class="spacer-20" style="background-size: cover;"></div>
                                     
                                    <h5>Blockchain Network</h5>
                                    <select name="blockchain" class="form-select" id="blockchain_network" disabled="disabled">
                                         <option value="Blokista">Blokista</option>
                                    </select>

                                    <div class="spacer-20" style="background-size: cover;"></div>

                                </div>
                        </div>

                        <div id="sidebar" class="col-lg-4" style="background-size: cover;">
                            <h5>Collection image <i class="fa fa-info-circle id-color-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Recommend 400 x 400. Max size: 50MB. Click the image to upload." aria-label="Recommend 400 x 400. Max size: 50MB. Click the image to upload."></i></h5>

                            <img src="img/author_thumbnail.jpg" id="click_profile_img" class="d-profile-img-edit img-fluid" alt="">
                            <input type="file" id="Collection_image" accept="image/*"> 

                            <div class="spacer-30" style="background-size: cover;"></div>

                            <h5>Collection banner <i class="fa fa-info-circle id-color-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Recommend 1500 x 500. Max size: 50MB. Click the image to upload." aria-label="Recommend 1500 x 500. Max size: 50MB. Click the image to upload."></i></h5>
                            <img src="img/author_banner.jpg" id="click_banner_img" class="d-banner-img-edit img-fluid" alt="">
                            <input type="file" id="Collection_banner" accept="image/*"> 

                        </div> 
                          <a onclick="saveCollection()" type="submit" class="btn-main mt-5">Upload</a>
                    </div>
                </div>
            </section>

            
 
            </div>
        <!-- content close -->
        
<script>
    document.getElementById('Collection_image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('click_profile_img');
    // const fileNameElement = document.getElementById('file_name');

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            // fileNameElement.innerText = file.name;
        };

        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
        fileNameElement.innerText = 'PNG, JPG, GIF, WEBP or MP4. Max 20mb.';
    }
    
    });
    
    
    document.getElementById('Collection_banner').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('click_banner_img');
    // const fileNameElement = document.getElementById('file_name');

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            // fileNameElement.innerText = file.name;
        };

        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
        fileNameElement.innerText = 'PNG, JPG, GIF, WEBP or MP4. Max 20mb.';
    }
});

</script>
        
        <script type="module">

    import { WagmiCore } from "https://unpkg.com/@web3modal/ethereum@2.6.2";
    const { getContract, writeContract, getAccount, waitForTransaction, fetchBalance, watchAccount } = WagmiCore
    let contractInstance = getContract({ address: contractAddress, abi: contractAbi, chainId: chainId });
    const account = getAccount();
    let isConnected = account.isConnected;
    let selectedAddress = account.address;

    watchAccount(async (account) => {
        selectedAddress = account.address;
        isConnected = account.isConnected;
    });


    window.saveCollection = async function saveCollection() {
        if (!isConnected) return Swal.fire("Error", "Please connect your wallet first", "error")
        let name = document.getElementById('name').value;
        let discription = document.getElementById('description').value;
        let url = document.getElementById('url').value;
        let category = document.getElementById('category').value;
        let blockchain_network = document.getElementById('blockchain_network').value;
        let title = document.getElementById('title').value;
        let coverImage = document.getElementById("Collection_banner").files[0];
        let logoImage = document.getElementById("Collection_image").files[0];

        console.log(name, discription, coverImage, logoImage, ' discription')
        if (name == "" || discription == "" || coverImage === undefined || logoImage === undefined || title=="") {
            let message = "";
            if (name == "") {
                message = "Please enter the collection name.";
            }else if (title == "") {
                message = "Please enter a collection title.";
            } else if (discription == "") {
                message = "Please enter a collection description.";
            } else if (coverImage == undefined) {
                message = "Please choose collection logo.";
            } else {
                message = "Please choose the collection image.";
            }
            Swal.fire({
                icon: "warning",
                title: 'OOPS...',
                text: `${message}`,
            })

        } else {
            var formdata = new FormData();
            formdata.append("Displayname", name);
            formdata.append("discription", discription);
            formdata.append("coverImage", coverImage);
            formdata.append("logoImage", logoImage);
            formdata.append("owneraddress", selectedAddress);
            formdata.append("title", title);
            formdata.append("category", category);
            formdata.append("url", url);
            formdata.append("blockchain_network", blockchain_network);
            var requestOptions = {
                method: "POST",
                body: formdata,
                redirect: "follow",

            }

            try{
                
                fetch("./savecollection.php", requestOptions)
                .then((response) => response.json())
                .then((result) => {
                    console.log(result, " resultresultresult")
                    if (result.code == 200) {
                        Swal.fire({
                            icon: "success",
                            title: "Great...",
                            text: "Congratulation! Collection Created Successfully",
                        }).then((ok) => {
                            location.href = "./profile.php" + "?v=" + Math.floor((Math.random() * 1000000) + 1);
                        });
                        
                    } else {
                        console.log(result, " sonu singh")
                        Swal.fire({
                            icon: "warning",
                            title: "OOPS!...",
                            text: "Collection Name Already Exist",
                        });
                    }

                });
            } catch (error) {
            console.log(error, " errorrrrrrrrrrrrr")
        }

        }

    }
</script>
            
            
<?php include "footer.php";?>            
            