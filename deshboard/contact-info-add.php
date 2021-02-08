<?php 
  include 'includes/header.php';
  require_once '../database.php';

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="contactinfo.php">Contact Info</a>
        <span class="breadcrumb-item active">Add Contact Info</span>
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
            <form action="contactinfo-post.php" method="POST">
                    <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                        <h6 class="card-body-title text-center">Add New Contact Info</h6>

                        <div class="row">
                            <label class="col-sm-4 form-control-label">Contact Summary: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="summary" class="form-control" placeholder="Ex: Lorem ipsum dolar amet aset..">
                                <p style="color: red">
                                    <?php if(isset($_SESSION['summary_error'])): ?>
                                    
                                    <?php
                                        echo $_SESSION['summary_error'];
                                        unset($_SESSION['summary_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>
                        <!-- row -->

                        <div class="row">
                            <label class="col-sm-4 form-control-label">Contact Address: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="address" class="form-control" placeholder="Ex: Lorem ipsum dolar amet aset..">
                                <p style="color: red">
                                    <?php if(isset($_SESSION['address_error'])): ?>
                                    
                                    <?php
                                        echo $_SESSION['address_error'];
                                        unset($_SESSION['address_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4 form-control-label">Phone Number: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="phone" class="form-control" placeholder="Ex: +966579220920">
                                <p style="color: red">
                                    <?php if(isset($_SESSION['phone_error'])): ?>
                                    
                                    <?php
                                        echo $_SESSION['phone_error'];
                                        unset($_SESSION['phone_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4 form-control-label">Email Address: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="email" class="form-control" placeholder="Ex: demo.info@domain.com">
                                <p style="color: red">
                                    <?php if(isset($_SESSION['email_error'])): ?>
                                    
                                    <?php
                                        echo $_SESSION['email_error'];
                                        unset($_SESSION['email_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>

                        <div class="form-layout-footer mg-t-30 text-center">
                            <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Save Contact</button>
                        </div>
                    </div>
            </form>
                <!-- form-layout-footer -->
        </div>

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<?php include 'includes/footer.php' ?>