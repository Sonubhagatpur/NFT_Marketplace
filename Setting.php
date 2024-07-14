<?php include "header.php";?>

 <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            
             <section id="section-hero" class="mt-5">
                <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 offset-lg-3 text-center">
                                <h1>Setting</h1>
                            </div>
                        </div>
                    </div>
            </section>
            
            
               <!-- section begin -->
            <section id="section-main" class="pt-0" aria-label="section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <form id="form-create-item" class="form-border" method="post" action="email.php">
                            <div class="de_tab tab_simple">
                            
                                <ul class="de_nav">
                                    <li class="active"><span><i class="fa fa-user"></i>Profile</span></li>
                                    <li><span><i class="fa fa-money"></i>Withdraw</span></li>
                                    <li><span><i class="fa fa-list"></i>Transactions</span></li>
                                </ul>
                                
                                <div class="de_tab_content">                            
                                    <div class="tab-1">
                                        <div class="row wow fadeIn">
                                            <div class="col-lg-8 mb-sm-20" id="userProfile">
                                                    <div class="field-set">
                                                        <h5>Username</h5>
                                                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">                                    

                                                        <div class="spacer-20"></div>

                                                        <h5>Custom URL</h5>
                                                        <input type="text" name="custom_url" id="custom_url" class="form-control" placeholder="Enter your custom URL">

                                                        <div class="spacer-20"></div>

                                                        <h5>Bio</h5>
                                                        <textarea name="bio" id="bio" class="form-control" placeholder="Tell the world who you are!"></textarea>

                                                        <div class="spacer-20"></div>

                                                        <h5>Email Address*</h5>
                                                        <input type="email" name="email_address" id="email_address" class="form-control" placeholder="Enter email">

                                                        <div class="spacer-20"></div>

                                                        <h5><i class="fa fa-link"></i> Your site</h5>
                                                        <input type="text" name="your_site" id="your_site" class="form-control" placeholder="Enter Website URL">

                                                        

                                                    </div>
                                            </div>

                                            <div id="sidebar" class="col-lg-4">
                                                <h5>Profile image <i class="fa fa-info-circle id-color-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Recommend 400 x 400. Max size: 50MB. Click the image to upload."></i></h5>

                                                <img src="img/author_thumbnail.jpg" id="click_profile_img" class="d-profile-img-edit img-fluid" alt="">
                                                <input type="file" id="Profile_image" accept="image/*"> 

                                                <div class="spacer-30"></div>

                                                <h5>Profile banner <i class="fa fa-info-circle id-color-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Recommend 1500 x 500. Max size: 50MB. Click the image to upload."></i></h5>
                                                <img src="img/author_banner.jpg" id="click_banner_img" class="d-banner-img-edit img-fluid" alt="">
                                                <input type="file" id="Profile_banner" accept="image/*"> 

                                            </div> 
                                              <button onclick="updateProfile()" type="submit" class="btn-main">Upload</button>
                                        </div>
                                    </div>

                                    <div class="tab-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="fw-semi-bold">Withdraw</h4>
                                                <h6>Important</h6>
                                                <p>Please reload your balance then send amount less than balance</p>
                                                <div class="mt-5">

                                                <div class="row">   
                                                    <div class="text-center">
                                                        <span class="biding_balance"> 0</span> BCC <a href="javascript:;" mywallet="0x9d0893114a813f8418cf9efef5d8e9ddab78aa9e" contrctaddress="0xF64cf3048F5121506221E46689b41B49Fca1036E" id="reload_my_biding_balance">Reload balance</a>
                                                    </div> 
                                                </div> 
                                                
                                                <form action="" class="withdraw-form" ,="" id="withdraw_form" method="post" accept-charset="utf-8">
                 
                                                    
                                                    <div class="mb-4">
                                                        <label for="wallet-address" class="form-label fw-semi-bold text-black mb-1">Wallet Address <span class="text-danger">*</span></label>
                                                        <input type="text" name="wallet_address" class="form-control form-control-bg" id="wallet_address" value="" placeholder="Wallet Address Ex: 0x" autocomplete="off" required="required">
                                                    </div>
                
                                                    <div class="mb-4">
                                                        <label for="wallet-address" class="form-label fw-semi-bold text-black mb-1">Amount <span class="text-danger">*</span></label>
                                                        <input type="text" name="amount" class="form-control form-control-bg" id="send_amount" value="" placeholder="Enter send amount" autocomplete="off" required="required">
                                                    </div>
                
                                                    <div>
                                                        <button type="submit" class="btn-main">Send</button>
                                                    </div>
                 
                                                </form>                                
                                                 
                                               
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-3">
                                        <div class="row">
                                            <div class="col-md-12 mb-sm-30">
                                                <h4 class="fw-semi-bold">Transactions</h4>
                                                <div class="mt-5">

                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Status</th>
                                                             
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        <th>#</th>
                                                            <th>1</th>
                                                            <th>23.88</th>
                                                            <th>Pending</th>
                                                    </tbody>
                                                </table> 
                                            </div>
                                                
                                            </div>

                                            
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="spacer-30"></div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            
            </div>
        <!-- content close -->
        
<script>
    document.getElementById('Profile_image').addEventListener('change', function(event) {
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
    
    
    document.getElementById('Profile_banner').addEventListener('change', function(event) {
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
        const { getAccount, watchAccount } = WagmiCore
        const account = getAccount();
        let isConnected = account.isConnected;
        let selectedAddress = account.address;
        watchAccount(async (account) => {
            selectedAddress = account.address;
            isConnected = account.isConnected;
            if(isConnected){
                showProfile(selectedAddress)
            }
        })

        window.updateProfile = async function updateProfile() {
            try {
                if (!isConnected) return Swal.fire("Warning", "Please connect your wallet First", "warning");
                const name = document.getElementById('username').value;
                const email = document.getElementById('email_address').value;
                const custom_url = document.getElementById('custom_url').value;
                const your_site = document.getElementById('your_site').value;
                const description = document.getElementById('bio').value;
                const profileImage = document.getElementById('Profile_image').files[0];
                const coverImage = document.getElementById('Profile_banner').files[0];
                console.log(name, email, description, profileImage, coverImage, " sssss");
                var formdata = new FormData();
                formdata.append("Username", name);
                formdata.append("profileImage", profileImage);
                formdata.append("coverImage", coverImage);
                formdata.append("Email", email);
                formdata.append("Bio", description);
                formdata.append("Userportfolio", your_site);
                formdata.append("url", custom_url);
                formdata.append("address", selectedAddress);

                var requestOptions = {
                    method: "POST",
                    body: formdata,
                    redirect: "follow",
                };
                fetch("./updateuserinfo.php", requestOptions)
                    .then((response) => response.json())
                    .then((result) => {
                        console.log(result, " resultresult")
                        if(result.code==200){
                        Swal.fire({
                            icon: "success",
                            title: "Great...",
                            text: result.message,
                        }).then((ok) => {
                            location.href = "./profile.php" + "?v=" + Math.floor((Math.random() * 1000000) + 1);
                        });
                        }else{
                            Swal.fire({
                            icon: "Error",
                            title: "Bad...",
                            text: result.message,
                        })
                            
                        }

                    }).catch((error)=>{
                            console.log(error, " errorerror")
                    })

            } catch (error) {
                console.log(error, " error");
            }
        }
        
        
        async function showProfile(selectedAddress){
            if (!isConnected) return Swal.fire("Warning", "Please connect your wallet First", "warning");
            var formdata = new FormData();
            formdata.append("address", selectedAddress);
            var requestOptions = {
                    method: "POST",
                    body: formdata,
                    redirect: "follow",
                };
                fetch("./getuserinfo.php", requestOptions)
                    .then((response) => response.json())
                    .then((result) => {
                        document.getElementById("username").value = result.Username;
                        document.getElementById("custom_url").value = result.url;
                        document.getElementById("bio").value = result.Userbio;
                        document.getElementById("email_address").value = result.Useremail;
                        document.getElementById("your_site").value = result.Userportfolio;
                    }).catch({

                    })
            
        }


    </script>
            
            

<?php include "footer.php";?>            
            