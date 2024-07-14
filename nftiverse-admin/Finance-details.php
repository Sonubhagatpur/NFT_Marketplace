 <?php include "header.php";?>
 
  <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show">
                <div class="container container__bscreen">
                    <div class="row mt-4">
                      <div class="col-md-12">
                         <div class="heading-sec">
                             <h4> <i class="fa-solid fa-users"></i> Biding deposit Details</h4>
                         </div> 
                      </div>  
                    </div>
                    
                     <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card p-5">
                                    <form>
                                        <div class="row">
                                            <div class="form-group col-lg-6 mt-2">
                                                <label>To Wallet<span class="text-danger"> *</span></label>
                                                <input type="text" value="" class="form-control" readonly="readonly" name="" placeholder="jhsuft76fg76gf67">
                                            </div>
                                                              
                                            <div class="form-group col-lg-6 mt-2">
                                                <label>Amount<span class="text-danger"> *</span></label>
                                                <input type="text" value="" class="form-control" readonly="readonly" name="email" placeholder="67.9">
                                            </div>
                                            
                                            <div class="form-group col-lg-6 mt-2">
                                                <label for="status" class=" col-form-label">Status<span class="text-danger"> *</span></label>
                                                <div class="col-sm-12">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="status" value="1" checked="checked">  Active  </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="status" value="0">  Pending  </label> 
                                                    <label class="radio-inline">
                                                        <input type="radio" name="status" value="2">  Suspend  </label> 
                                                    
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