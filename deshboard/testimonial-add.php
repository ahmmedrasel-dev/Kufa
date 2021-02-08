<?php 
  include 'includes/header.php';
  
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="testimonial.php">Testimonial</a>
        <span class="breadcrumb-item active">Add Testimonial</span>
      </nav>
        <div class="service_form p-5">
            <?php if(isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                        <span>
                            <?php 
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            ?>
                        </span>
                </div> 
            <?php endif; ?>
            <form action="testimonial-post.php" method="POST" enctype="multipart/form-data">
                    <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                        <h6 class="card-body-title text-center">Add New Testimonial</h6>

                        <div class="row">
                            <label class="col-sm-4 form-control-label">Client Name: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="clientName" class="form-control" placeholder="Ex: Rasel Ahmmed">
                                <p style="color: red">
                                    <?php if(isset($_SESSION['clientName_error'])): ?>
                                    
                                    <?php
                                        echo $_SESSION['clientName_error'];
                                        unset($_SESSION['clientName_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Client Designation: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" name="designation" placeholder="Ex: Full-stack Developer">
                                <p style="color: red">
                                    <?php if(isset($_SESSION['designation_error'])): ?>
                                    
                                    <?php
                                        echo $_SESSION['designation_error'];
                                        unset($_SESSION['designation_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Client Comment: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" name="clientComment" placeholder="Ex: Full-stack Developer">
                                <p style="color: red">
                                    <?php if(isset($_SESSION['Comment_error'])): ?>
                                    
                                    <?php
                                        echo $_SESSION['Comment_error'];
                                        unset($_SESSION['Comment_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row mg-t-20">
                          <label class="col-sm-4 form-control-label">Client Photo: <span class="tx-danger">*</span></label>
                          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                              <input type="file" class="form-control" name="clientPhoto">
                                <p style="color: red">  
                                    <?php if(isset($_SESSION['clientPhoto_error'])): ?>
                                    <?php
                                        echo $_SESSION['clientPhoto_error'];
                                        unset($_SESSION['clientPhoto_error']);
                                    endif; ?>
                                </p>
                          </div>
                        </div>
                        <div class="form-layout-footer mg-t-30 text-center">
                            <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Save Testimonail</button>
                        </div>
                    </div>
            </form>
                <!-- form-layout-footer -->
        </div>

</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php include('includes/footer.php') ?>