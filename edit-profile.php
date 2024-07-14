<?php include "header.php"; ?>
<!-- ENd Header Area -->

<!-- Start tabs area -->
<div class="edit-profile-area rn-section-gapTop">
    <div class="container">
        <div class="row plr--70 padding-control-edit-wrapper pl_md--0 pr_md--0 pl_sm--0 pr_sm--0">
            <div class="col-12 d-flex justify-content-between mb--30 align-items-center">
                <h4 class="title-left">Edit Your Profile</h4>
                <a href="profile.php" class="btn btn-primary ml--10"><i class="fa fa-eye mr--5"></i> Preview</a>
            </div>
        </div>
        <div class="row plr--70 padding-control-edit-wrapper pl_md--0 pr_md--0 pl_sm--0 pr_sm--0">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <!-- Start tabs area -->
                <nav class="left-nav rbt-sticky-top-adjust-five">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true"><i class="fa fa-edit"></i>Edit Profile Image</button>
                        <button class="nav-link" id="nav-home-tabs" data-bs-toggle="tab" data-bs-target="#nav-homes"
                            type="button" role="tab" aria-controls="nav-homes" aria-selected="false"><i
                                class="fa fa-user"></i>Personal Information</button>
                    </div>
                </nav>
                <!-- End tabs area -->
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 mt_sm--30">
                <div class="tab-content tab-content-edit-wrapepr" id="nav-tabContent">

                    <!-- sigle tab content -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <!-- start personal information -->
                        <div class="nuron-information">

                            <div class="profile-change row g-5">
                                <div class="profile-left col-lg-4">
                                    <div class="profile-image mb--30">
                                        <h6 class="title">Change Your Profile Picture</h6>
                                        <img id="rbtinput1" src="images/profile-01.jpg" alt="Profile-NFT">
                                    </div>
                                    <div class="button-area">
                                        <div class="brows-file-wrapper">
                                            <!-- actual upload which is hidden -->
                                            <input name="fatima" id="fatima" type="file">
                                            <!-- our custom upload button -->
                                            <label for="fatima" title="No File Choosen">
                                                <span class="text-center color-white">Upload Profile</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-left right col-lg-8">
                                    <div class="profile-image mb--30">
                                        <h6 class="title">Change Your Cover Photo</h6>
                                        <img id="rbtinput2" src="images/cover-04.png" alt="Profile-NFT">
                                    </div>
                                    <div class="button-area">
                                        <div class="brows-file-wrapper">
                                            <!-- actual upload which is hidden -->
                                            <input name="nipa" id="nipa" type="file">
                                            <!-- our custom upload button -->
                                            <label for="nipa" title="No File Choosen">
                                                <span class="text-center color-white">Upload Cover</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End personal information -->
                    </div>
                    <!-- End single tabv content -->
                    <!-- sigle tab content -->
                    <div class="tab-pane fade" id="nav-homes" role="tabpanel" aria-labelledby="nav-home-tab">
                        <!-- start personal information -->
                        <div class="nuron-information">

                            <div class="profile-form-wrapper">
                                <div class="input-two-wrapper mb--15">
                                    <div class="first-name half-wid">
                                        <label for="contact-name" class="form-label">Name</label>
                                        <input name="contact-name" id="contact-name" type="text" placeholder="Mr.">
                                    </div>
                                    <div class="last-name half-wid">
                                        <label for="contact-name-last" class="form-label">Email</label>
                                        <input name="contact-email" id="contact-email" type="email"
                                            placeholder="exampler@gmail.com">
                                    </div>
                                </div>
                                <div class="profile-form-wrapper">
                                    <div class="input-two-wrapper mb--15">
                                        <div class="first-name half-wid">
                                            <label for="contact-name" class="form-label">Twitter Account</label>
                                            <input name="contact-name" id="contact-Twitter" type="text"
                                                placeholder="Mr.">
                                        </div>
                                        <div class="last-name half-wid">
                                            <label for="contact-name-last" class="form-label">Instagram Account</label>
                                            <input name="contact-name" id="contact-Instagram" type="text"
                                                placeholder="Sunayra">
                                        </div>
                                    </div>

                                </div>


                                <!-- edit bio area Start-->
                                <div class="edit-bio-area mt--20">
                                    <label for="Discription" class="form-label">Edit Your Bio</label>
                                    <textarea id="Discription"></textarea>
                                </div>
                                <!-- edit bio area End -->



                                <div class="button-area save-btn-edit">
                                    <a href="#" class="btn btn-primary-alta mr--15" onclick="history.back()">Cancel</a>
                                    <a href="#" class="btn btn-primary" onclick="updateProfile()">Save</a>
                                </div>

                            </div>
                            <!-- End personal information -->
                        </div>
                        <!-- End single tabv content -->

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End tabs area -->

    <!-- Start Footer Area -->
    <?php include "footer.php"; ?>
    <!-- End Footer Area -->

    <script type="module">
        import { WagmiCore } from "https://unpkg.com/@web3modal/ethereum@2.6.2";
        const { getAccount, watchAccount } = WagmiCore
        const account = getAccount();
        let isConnected = account.isConnected;
        let selectedAddress = account.address;
        watchAccount(async (account) => {
            selectedAddress = account.address;
            isConnected = account.isConnected;
        })

        window.updateProfile = async function updateProfile() {
            try {
                if (!isConnected) return Swal.fire("Warning", "Please connect your wallet First", "warning");
                const name = document.getElementById('contact-name').value;
                const email = document.getElementById('contact-email').value;
                const Instagram = document.getElementById('contact-Twitter').value;
                const Twitter = document.getElementById('contact-Twitter').value;
                const description = document.getElementById('Discription').value;
                const profileImage = document.getElementById('fatima').files[0];
                const coverImage = document.getElementById('nipa').files[0];
                console.log(name, email, Instagram, Twitter, description, profileImage, coverImage, " sssss");
                var formdata = new FormData();
                formdata.append("Username", name);
                formdata.append("tokenimage", profileImage);
                formdata.append("tokenimage1", coverImage);
                formdata.append("Email", email);
                formdata.append("Bio", description);
                formdata.append("Instagram", Instagram);
                formdata.append("Twitter", Twitter);
                formdata.append("address", selectedAddress);

                var requestOptions = {
                    method: "POST",
                    body: formdata,
                    redirect: "follow",
                };
                fetch("./updateuserinfo.php", requestOptions)
                    .then((response) => response.text())
                    .then((result) => {
                        console.log(result)
                        // document.getElementById("loadingdiv").className = "d-none";
                        Swal.fire({
                            icon: "success",
                            title: "Great...",
                            text: "Profile Update Successfully",
                        }).then((ok) => {
                            location.href = "./profile.php" + "?v=" + Math.floor((Math.random() * 1000000) + 1);
                        });

                    }).catch({

                    })

            } catch (error) {
                console.log(error, " error");
            }
        }


    </script>