 <?php include "header.php";?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-users"></i> Customer Details</h4>
                         </div> 
                      </div>  
                    </div>
                    
                     <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="p-5">
                                    <form>
                                        <div class="row">
                                            <div class="form-group col-lg-6 mt-2">
                                                <label>Username<span class="text-danger"> *</span></label>
                                                <input type="text" value="" class="form-control" readonly="readonly" name="username" placeholder="Username">
                                            </div>
                                                              
                                            <div class="form-group col-lg-6 mt-2">
                                                <label>Email Address<span class="text-danger"> *</span></label>
                                                <input type="text" value="sendittorajeevm@gmail.com" class="form-control" readonly="readonly" name="email" placeholder="Email Address">
                                            </div>
                                            
                                            <div class="form-group col-lg-6 mt-2">
                                                <label>First Name </label>
                                                <input type="text" value="RAJEEV" class="form-control" readonly="readonly" name="f_name" placeholder="First Name">
                                            </div>
                                            
                                            <div class="form-group col-lg-6 mt-2">
                                                <label>Last Name </label>
                                                <input type="text" value="MALHOTRA" class="form-control" readonly="readonly" name="l_name" placeholder="Last Name">
                                            </div>
                                            
                                            <div class="form-group col-lg-6 mt-2">
                                                <label>Mobile</label>
                                                <input type="text" value="" readonly="readonly" id="mobile" class="form-control" name="phone" placeholder="Mobile">
                                            </div>
                                            
                                            <div class="form-group col-lg-6 mt-2">
                                                <label for="status" class=" col-form-label">Status<span class="text-danger"> *</span></label>
                                                <div class="col-sm-12">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="status" value="1" checked="checked">  Block  </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="status" value="0">  Unblock  </label> 
                                                    
                                            </div>
                    
                                        </div> 
                                        <div class="mt-2">
                                            <a href="" class="btn btn-primary">Cancel</a>
                                            <a type="submit" name="edit" class="btn btn-success">Update</a>
                                        </div>
                                    </form>            
                                    </div>
                        </div>
                    </div>
                </div>
           </section> 
           
           <style>
               .radio-inline {text-align: center;}
               .radio-inline input {  height: 26px;}
           </style>
 
   <!-- End crancy Dashboard -->
        </div>
<?php include "footer.php";?>           